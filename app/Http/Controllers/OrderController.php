<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->stores = Store::get();
    }

    public function orders()
    {
        $is_store = null;
        if (Auth::check()) {
            $is_store = $this->stores->where('user_id', Auth::id())->first();
        }
        $sales = Order::get();
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('orders', compact('orders', 'is_store', 'sales'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::orderBy('order_status_id')->get();
        return view('dashboard.order.index', compact('orders', 'orders_stats'));
    }
    public function accepted()
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()->where('order_status_id', 3)->orderBy('updated_at')->get();
        return view('dashboard.order.statuses.accepted', compact('orders', 'orders_stats'));
    }
    public function onTheWay()
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()->where('order_status_id', 4)->orderBy('updated_at')->get();
        return view('dashboard.order.statuses.onTheWay', compact('orders', 'orders_stats'));
    }
    public function onCheck()
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()->where('order_status_id', 1)->orderBy('updated_at')->get();
        return view('dashboard.order.statuses.onCheck', compact('orders', 'orders_stats'));
    }
    public function canceled()
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()->where('order_status_id', 2)->orderBy('updated_at')->get();
        return view('dashboard.order.statuses.canceled', compact('orders', 'orders_stats'));
    }
    public function returns()
    {
        $orders_stats = Order::withoutGlobalScopes()->orderBy('order_status_id')->get();

        $orders = Order::withoutGlobalScopes()->where('order_status_id', 5)->orderBy('updated_at')->get();
        return view('dashboard.order.statuses.returns', compact('orders', 'orders_stats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            if($request->input('attributes')){
                $order = Order::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::id(),
                    'total' => $product->price,
                    'margin' => $request->total_price-$product->price,
                    'address' => $request->address,
                    'quantity' => $request->quantity,
                    'attributes' => $request->attributes ? json_encode($request->input('attributes')) : null,
                    'comment' => $request->comment,
                    'order_status_id' => '1'
                ]);
            }
            else{
                $order = Order::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::id(),
                    'total' => $product->price,
                    'margin' => $request->total_price-$product->price,
                    'address' => $request->address,
                    'quantity' => $request->quantity,
                    'comment' => $request->comment,
                    'order_status_id' => '1'
                ]);
            }
            $product->decrement('quantity');
            $product->save();
            if($order) {
                $comment = '';
                if ( !empty ( $order->comment ) ) {
                    $comment = "\n Примичание к заказу: " .$order->comment;
                }
                $config = array(
                    'login' => 'fasontj',  // Ваш логин, который выдается администратором OsonSMS
                    'hash' => '9c1891437739e62b0cd45d7c8e232739',  // Ваш хэш, который выдается администратором OsonSMS
                    'sender' => 'fason.tj', // 'Альфанумерик, СМС отправитель'
                    'server' => 'http://api.osonsms.com/sendsms_v1.php' // 'Адрес сервера'
                );
                $dlm = ";";
                $phone_number = Auth::user()->phone; //номер телефона
                $txn_id = uniqid(); //ID сообщения в вашей базе данных, оно должно быть уникальным для каждого сообщения
                $str_hash = hash('sha256', $txn_id . $dlm . $config['login'] . $dlm . $config['sender'] . $dlm . $phone_number . $dlm . $config['hash']);
                $message = "\n Ваш заказ: #" .$order->id. " \n Название товара: " .$order->product->name. "\n Количество: " .$order->quantity. "\n Сумма: " .($order->total + $order->margin)." сомони". "\n Адрес доставки: " .$order->address . $comment;
                
                $params = array(
                    "from" => $config['sender'],
                    "phone_number" => $phone_number,
                    "msg" => $message,
                    "str_hash" => $str_hash,
                    "txn_id" => $txn_id,
                    "login" => $config['login'],
                );

                $result = $this->call_api($config['server'], "GET", $params);
                if ((isset($result['error']) && $result['error'] == 0)) {
                    $response = json_decode($result['msg']);
                    print_r($response);
                    /* так выглядет ответ сервера
                    * {
                            "status": "ok",
                            "timestamp": "2017-07-07 16:58:12",
                            "txn_id": "f890b43b964c2801f62b61a9662efff96dbaa82e007bc60c22ec41d9b22a3e0b",
                            "msg_id": 40127,
                            "smsc_msg_id": "45f22479",
                            "smsc_msg_status": "success",
                            "smsc_msg_parts": 1
                        }
                    */
                    #echo "success: ".$response->msg_id; // id сообщения для проверки статуса сообщения в спорных случаях
                } else {
                    print_r($result);
                    #echo "error occured ".$result['msg'];
                }
            }
            return response()->json([
                "order"=> $order
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
        if($order->attributes){
            $attributes = collect();
            for ($i=0; $i < count(json_decode($order->attributes)); $i++) {
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
        return view('orders.show', compact('product', 'attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
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
            CURLOPT_CUSTOMREQUEST => $method
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

    public function acceptOrder(Order $order)
    {
        $order->update(['order_status_id' => 4]);
        return redirect()->route('orders.index')->with(['success' => 'Заказ успншно приянт']);
    }

    public function completeOrder(Order $order)
    {
        $order->update(['order_status_id' => 3]);
        return redirect()->route('orders.index')->with(['success' => 'Заказ успншно выполнен']);
    }

    public function declineOrder(Order $order)
    {
        $order->update(['order_status_id' => 2]);
        return redirect()->route('orders.index')->with(['success' => 'Заказ отклонен']);
    }
}
