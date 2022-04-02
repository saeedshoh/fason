<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilters;
use App\Models\AttributeValue;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders()
    {
        $is_store = $sales = [];
        if (Auth::check()) {
            $is_store = Store::where('user_id', Auth::id())->first();
        }
        if ($is_store) {
            $sales = Order::whereHas('no_scope_product', function ($no_scope_product) {
                $no_scope_product->where('store_id', auth()->user()->store->id);
            })->latest()->paginate(10);
        }
        $orders = Order::where('user_id', Auth::id())
            ->with('attribute_values')
            ->latest('id')->paginate(10);
        return view('orders', compact('orders', 'is_store', 'sales'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, OrderFilters $filters)
    {
        $orders = Order::filter($filters)
            ->orderByRaw('FIELD(order_status_id, "1", "4", "5", "3", "2")')
            ->orderBy('id', 'desc')
            ->with('user', 'store', 'product')
            ->paginate(50)
            ->withQueryString();

        $rdrs = Order::filter($filters)->get()->pluck('id');
        $users = $products = $stores = null;
        if ($rdrs->isNotEmpty()) {
            $users = User::where('status', 2)
                ->has('orders')
                ->get(['id', 'name']);
            $products = Product::withoutGlobalScopes()
                ->has('orders')
                ->get(['id', 'name']);

            $stores = Store::withoutGlobalScopes()
                ->has('orders')
                ->get(['id', 'name']);
        }

        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();
        if ($request->ajax()) {
            return response()->json(
                view('dashboard.ajax.orders', compact('orders', 'orders_stats', 'users', 'products', 'stores')
                )->render());
        }
        return view('dashboard.order.index', compact('orders', 'orders_stats', 'users', 'products', 'stores'));
    }

    public function accepted(Request $request, OrderFilters $filters)
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()
            ->where('order_status_id', 3)
            ->filter($filters)
            ->orderBy('id', 'desc')
            ->with('user', 'store', 'product')
            ->paginate(50
            )
            ->withQueryString();

        $rdrs = Order::where('order_status_id', 3)->filter($filters)->get()->pluck('id');
        $users = $products = $stores = null;
        if ($rdrs->isNotEmpty()) {
            $users = User::where('status', 2)
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 3);})
                ->get(['id', 'name']);

            $products = Product::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 3);})
                ->get(['id', 'name']);

            $stores = Store::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 3);})
                ->get(['id', 'name']);
        }
        return view('dashboard.order.statuses.accepted', compact('orders', 'orders_stats', 'users', 'products', 'stores'));
    }

    public function onTheWay(Request $request, OrderFilters $filters)
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()
            ->where('order_status_id', 4)
            ->filter($filters)
            ->orderBy('id', 'desc')
            ->with('user', 'store', 'product')
            ->paginate(50)
            ->withQueryString();

        $rdrs = Order::where('order_status_id', 4)->filter($filters)->get()->pluck('id');
        $users = $products = $stores = null;
        if ($rdrs->isNotEmpty()) {
            $users = User::where('status', 2)
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 4);})
                ->get(['id', 'name']);

            $products = Product::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 4);})
                ->get(['id', 'name']);

            $stores = Store::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 4);})
                ->get(['id', 'name']);
        }
        return view('dashboard.order.statuses.onTheWay', compact('orders', 'orders_stats', 'users', 'products', 'stores'));
    }

    public function onCheck(Request $request, OrderFilters $filters)
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()
            ->where('order_status_id', 1)
            ->filter($filters)
            ->orderBy('id', 'desc')
            ->with('user', 'store', 'product')
            ->paginate(50)
            ->withQueryString();

        $rdrs = Order::where('order_status_id', 1)->filter($filters)->get()->pluck('id');
        $users = $products = $stores = null;
        if ($rdrs->isNotEmpty()) {
            $users = User::where('status', 2)
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 1);})
                ->get(['id', 'name']);

            $products = Product::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 1);})
                ->get(['id', 'name']);

            $stores = Store::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 1);})
                ->get(['id', 'name']);
        }
        return view('dashboard.order.statuses.onCheck', compact('orders', 'orders_stats', 'users', 'products', 'stores'));
    }

    public function canceled(Request $request, OrderFilters $filters)
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()
            ->where('order_status_id', 2)
            ->filter($filters)
            ->orderBy('id', 'desc')
            ->with('user', 'store', 'product')
            ->paginate(50)
            ->withQueryString();

        $rdrs = Order::where('order_status_id', 2)->filter($filters)->get()->pluck('id');
        $users = $products = $stores = null;
        if ($rdrs->isNotEmpty()) {
            $users = User::where('status', 2)
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 2);})
                ->get(['id', 'name']);

            $products = Product::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 2);})
                ->get(['id', 'name']);

            $stores = Store::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 2);})
                ->get(['id', 'name']);
        }
        return view('dashboard.order.statuses.canceled', compact('orders', 'orders_stats', 'users', 'products', 'stores'));
    }

    public function returns(Request $request, OrderFilters $filters)
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()
            ->where('order_status_id', 5)
            ->filter($filters)
            ->orderBy('id', 'desc')
            ->with('user', 'store', 'product')
            ->paginate(50)
            ->withQueryString();

        $rdrs = Order::where('order_status_id', 5)->filter($filters)->get()->pluck('id');
        $users = $products = $stores = null;
        if ($rdrs->isNotEmpty()) {
            $users = User::where('status', 2)
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 5);})
                ->get(['id', 'name']);

            $products = Product::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 5);})
                ->get(['id', 'name']);

            $stores = Store::withoutGlobalScopes()
                ->whereHas('orders', function ($orders) {
                    $orders->where('orders.order_status_id', 5);})
                ->get(['id', 'name']);
        }
        return view('dashboard.order.statuses.returns', compact('orders', 'orders_stats', 'users', 'products', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::find($request->product_id);
            if ($request->input('attributes')) {
                $order = Order::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::id(),
                    'store_id' => $product->store->id,
                    'total' => $product->price,
                    'margin' => $request->total_price - $product->price,
                    'address' => $request->address,
                    'quantity' => $request->quantity,
                    'attributes' => $request->attributes ? json_encode($request->input('attributes')) : null,
                    'comment' => $request->comment,
                    'order_status_id' => '1',
                ]);
                foreach ($request->input('attributes') as $attribute_value) {
                    $order->attribute_values()->attach($attribute_value);
                }
            } else {
                $order = Order::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::id(),
                    'store_id' => $product->store->id,
                    'total' => $product->price,
                    'margin' => $request->total_price - $product->price,
                    'address' => $request->address,
                    'quantity' => $request->quantity,
                    'comment' => $request->comment,
                    'order_status_id' => '1',
                ]);
            }
            $product->decrement('quantity', $request->quantity);
            $product->save();
            if ($product->quantity == 0) {
                $product->update(['product_status_id' => 5]);
            }
            if ($order) {
                $comment = '';
                if (!empty($order->comment)) {
                    $comment = "\nПримечание к заказу: " . $order->comment;
                }
                $config = array(
                    'login' => 'fasontj', // Ваш логин, который выдается администратором OsonSMS
                    'hash' => '9c1891437739e62b0cd45d7c8e232739', // Ваш хэш, который выдается администратором OsonSMS
                    'sender' => 'fason.tj', // 'Альфанумерик, СМС отправитель'
                    'server' => 'http://api.osonsms.com/sendsms_v1.php', // 'Адрес сервера'
                );
                $attributes = null;
                if (json_decode($order->attributes)) {
                    $attributes_values = AttributeValue::whereIn('id', json_decode($order->attributes))->with('attribute')->get();
                    foreach ($attributes_values as $index => $attributes_value) {
                        $attributes .= $attributes_value->attribute->name . '-' . $attributes_value->name;
                        if ($index === count($attributes_values) - 1) {
                            $attributes .= '';
                        } else {
                            $attributes .= ', ';
                        }
                    }
                }
                $phone = Auth::user()->phone; //номер телефона
                $store_phone = $product->store->user->phone;

                $order_total = $order->total + $order->margin;
                $product_price = $order_total / $order->quantity;

                $message = "Ваш заказ: #" . $order->id . "\nНазвание товара: " . $product->name . "\nЦена товара: " . $product_price . " сомони" . "\nКоличество: " . $order->quantity . "\nСумма: " . $order_total . " сомони"  ."\nГород: " . ($product->store->city->name). "\nАдрес доставки: " . $order->address . $comment;
                $store_message = "У Вас заказали\nНазвание товара: " . $product->name . "\nКоличество: " . $order->quantity . "\nСумма: " . $order->total . " сомони";
                if ($attributes) {
                    $message .= "\nАттрибуты: " . $attributes;
                    $store_message .= "\nАттрибуты: " . $attributes;
                }
                $message .= "\nСпасибо за покупку.";
                $store_message .= "\nСпасибо что выбрали нас.";
                $result = $this->sendSMS($phone, $message, $config);
                $store_result = $this->sendSMS($store_phone, $store_message, $config);
            }
            return response()->json([
                "order" => $order,
                "product" => $product,
                "message" => $message,
                "result" => $result,
                "store_result" => $store_result,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $attributes = null;
        if ($order->attributes) {
            $attributes = collect();
            for ($i = 0; $i < count(json_decode($order->attributes)); $i++) {
                $attributes->push(AttributeValue::where('id', json_decode($order->attributes)[$i])->first());
            }
        }
        return view('dashboard.order.check', compact('order', 'attributes'));
    }

    public function single($order)
    {
        $order = Order::withoutGlobalScopes()->where('id', $order)->with('no_scope_product')->first();
        $product = Product::withoutGlobalScopes()->withTrashed()->where('id', $order->product_id)->first();
        $attributes = $product->attribute_variation;
        return view('orders.show', compact('product', 'attributes', 'order'));
    }

    public function call_api($url, $method, $params)
    {
        $curl = curl_init();
        $data = http_build_query($params);
        if ($method == "GET") {
            curl_setopt($curl, CURLOPT_URL, "$url?$data");
        } else if ($method == "POST") {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else if ($method == "PUT") {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Content-Length:' . strlen($data)));
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else if ($method == "DELETE") {
            curl_setopt($curl, CURLOPT_URL, "$url?$data");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else {
            dd("unkonwn method");
        }
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $arr = array();
        if ($err) {
            $arr['error'] = 1;
            $arr['msg'] = $err;
        } else {
            $res = json_decode($response);
            if (isset($res->error)) {
                $arr['error'] = 1;
                $arr['msg'] = "Error Code: " . $res->error->code . " Message: " . $res->error->msg;
            } else {
                $arr['error'] = 0;
                $arr['msg'] = $response;
            }
        }
        return $arr;
    }

    public function acceptOrder(Request $request, Order $order)
    {
        $order->update(['order_status_id' => 4]);
        return redirect($request->previous)->with(['success' => 'Заказ успншно приянт']);
    }

    public function completeOrder(Request $request, Order $order)
    {
        $order->update(['order_status_id' => 3]);
        return redirect($request->previous)->with(['success' => 'Заказ успншно выполнен']);
    }

    public function declineOrder(Request $request, Order $order)
    {
        $order->update(['order_status_id' => 2]);
        return redirect($request->previous)->with(['success' => 'Заказ отклонен']);
    }

    public function returnsOrder(Request $request, Order $order)
    {
        $order->update(['order_status_id' => 5]);
        return redirect($request->previous)->with(['success' => 'Заказ возвращен']);
    }

    public function statistics()
    {
        $invoices = Order::select(
            DB::raw('format(updated_at, "MM") as month'),
            DB::raw('SUM(total) as sum')
        )
            ->whereYear('updated_at', '=', Carbon::now()->year)
            ->orWhereYear('updated_at', '=', Carbon::now()->subYear()->year)
            ->groupBy('month')
            ->get();

        return $invoices;
    }

    public function sendSMS(string $phone, string $message, array $config)
    {
        $dlm = ";";
        $txn_id = uniqid(); //ID сообщения в вашей базе данных, оно должно быть уникальным для каждого сообщения
        $str_hash = hash('sha256', $txn_id . $dlm . $config['login'] . $dlm . $config['sender'] . $dlm . $phone . $dlm . $config['hash']);

        $params = array(
            "from" => $config['sender'],
            "phone_number" => $phone,
            "msg" => $message,
            "str_hash" => $str_hash,
            "txn_id" => $txn_id,
            "login" => $config['login'],
        );
        return $this->call_api($config['server'], "GET", $params);
    }
}
