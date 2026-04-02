<?php

namespace App\Http\Controllers;

use App\Model\HomeOfferSlider;
use App\Model\MapColorSize;
use App\Model\MstColor;
use App\Model\MstSize;
use App\Model\MstOffer;

use App\Model\ProductFaq;
use App\Model\Shop;
use App\Model\Slider;
use App\Model\Subscriber;
use App\Model\TxnCategory;
use App\Model\TxnCondition;
use App\Model\TxnImage;
use App\Model\TxnProduct;
use App\Model\TxnReview;
use App\Model\TxnUser;
use App\Services\LogisticService;


use App\MumbaiPincode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




class MainController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', true)->orderBy('sort_index')->get();
        $reviews = TxnReview::where('status', true)->with('product')->inRandomOrder()->take(10)->get();
        $homeOfferSliders = HomeOfferSlider::where('status', true)->orderBy('sort_index')->get();
        $categories = TxnCategory::select('name', 'slug_url', 'image_url')->where('status', true)->where('categorystatus',true)->withCount('products')->orderBy('parent_id')->inRandomOrder()->get();

        $products = DB::table('txn_products as p')
        ->selectRaw("p.id,p.title,p.slug_url,map.stock, p.image_url,w.user_id as w_u_id, w.id as w_id, w.product_id as
        w_product_id, p.image_url1,
        p.review_status,map.color_id as c_id, map.size_id as s_id, map.mrp, map.starting_price,
        FLOOR(AVG(txn_reviews.rating)) as
        rating , COUNT(txn_reviews.id) as total_rating")
        ->leftJoin("txn_reviews", "txn_reviews.product_id", "p.id")
        ->leftJoin("map_color_sizes as map", "map.product_id", "p.id")
        ->leftJoin("mst_colors as c", "c.id", "map.color_id")
        ->leftJoin("wishlists as w", "w.product_id", "p.id")
        ->where('p.status', true)
        ->groupBy('p.id')
        ->get();

        // ->selectRaw("p.id,p.title,p.slug_url,map.stock, p.image_url,w.user_id as w_u_id, w.id as w_id, w.product_id as
        // w_product_id, p.image_url1,
        // p.review_status,map.color_id as c_id, map.size_id as s_id, map.mrp, map.starting_price,
        // GROUP_CONCAT(DISTINCT(c.color_code)) as color_codes,
        // FLOOR(AVG(txn_reviews.rating)) as
        // rating , COUNT(txn_reviews.id) as total_rating")
        // ->leftJoin("txn_reviews", "txn_reviews.product_id", "p.id")
        // ->leftJoin("map_color_sizes as map", "map.product_id", "p.id")
        // ->leftJoin("mst_colors as c", "c.id", "map.color_id")
        // ->leftJoin("wishlists as w", "w.product_id", "p.id")
        // ->where('p.status', true)
        // ->groupBy('p.id')
        // ->get();
        $sections = DB::table('map_product_sections as mps')
            ->selectRaw('ms.SectionName as section_name, GROUP_CONCAT(mps.product_id) as product_ids')
            ->leftJoin('ms_sections as ms', 'mps.section_id', '=', 'ms.id')
            ->where('ms.status', true)
            ->groupBy('ms.id')
            ->get();

       $section_products = array();

foreach ($sections as $key => $sec) {
    $temp = $products->whereIn('id', explode(',', $sec->product_ids))->shuffle();
    $section_products[$sec->section_name] = $temp->all();
}


        return view('frontend.newproduct.index', compact('sliders', 'section_products', 'reviews', 'homeOfferSliders', 'categories'));
    }
    
public function mail(Request $request)
    {
        if (null !== $request->input('g-recaptcha-response')) {
            $secretKey = "6LeoZPsqAAAAAK8JcHHcCgJcGbvE1ECuj3tp4dMt";
            $ip = $request->ip();
            $response = $request->input('g-recaptcha-response');
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
            $fire = file_get_contents($url);
            $data = json_decode($fire);
            if ($data->success == true) {
                // dd($data);
                $formType = $request->input('form_type');
                if ($formType === 'product_enquiry') {
                    $name = !empty($request->name) ? $request->name : '';
                    $email = !empty($request->email) ? $request->email : '';
                    $phone = !empty($request->phone) ? $request->phone : '';
                    $message = !empty($request->message) ? $request->message : '';
                    $product = !empty($request->product_name) ? $request->product_name : '';
                    $text = "<table style=\"width: 100%; border: 2px solid black; border-collapse: collapse;\">
                                <tr>
                                    <th style=\"border: 2px solid black; text-align: center;\">Name</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Email</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Phone</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Product</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Message</th>
                                </tr>
                                <tr>
                                    <td style=\"border: 2px solid black; text-align: center;\">$name</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$email</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$phone</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$product</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$message</td>
                                    </tr>
                                    </table>";
                    $subject = 'Product Enquiry Form Submission';
                }
                else {
                    $name = !empty($request->name) ? $request->name : '';
                    $email = !empty($request->email) ? $request->email : '';
                    $phone = !empty($request->phone) ? $request->phone : '';
                    $message = !empty($request->message) ? $request->message : '';
                    $text = "<table style=\"width: 100%; border: 2px solid black; border-collapse: collapse;\">
                                <tr>
                                    <th style=\"border: 2px solid black; text-align: center;\">Name</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Email</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Phone</th>
                                    <th style=\"border: 2px solid black; text-align: center;\">Message</th>
                                </tr>
                                <tr>
                                    <td style=\"border: 2px solid black; text-align: center;\">$name</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$email</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$phone</td>
                                    <td style=\"border: 2px solid black; text-align: center;\">$message</td>
                                    </tr>
                                    </table>";
                    $subject = 'Enquiry Form Submission';
                }
                // dd($text);

                $mail = new PHPMailer; // create a n
                $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "mail.comfort-mattress.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "info@comfort-mattress.com";
                $mail->Password = "jMdQyyj{coFm";
                $mail->SetFrom("info@comfort-mattress.com", 'Comfort Mattress');
                // $mail->addAddress("info@comfort-mattress.com", "Comfort Mattress");
                // $mail->addBCC("sanjaresolutions@gmail.com", 'Sanjar E Solutions');
                // $mail->addBCC("mirzafaizan1931@gmail.com", 'Faizan');
                $mail->addAddress("siddiquimahfooz327@gmail.com", "Mahfooz Ahmed");
                $mail->addBCC("supritdagade77@gmail.com", 'Suprit Dagade');
                // $mail->Subject = "Enquiry form submitted data";
                $mail->Subject = $subject;
                $mail->Body = $text;
                if ($mail->Send()) {
                    dd("mail sent");
                    // Send data to CRM
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => 'https://sanjarcrm.com/api/leads/submit',
                        CURLOPT_POST => 1,
                        CURLOPT_POSTFIELDS => array(
                            'name' => $name,
                            'contact' => $phone,
                            'message' => $message,
                            'email' => $email,
                            'extra' => 'Popup',
                            'table_alias' => 'comfort_mattress_com_',
                            'api_key' => 'e98a33fc9fb8eeadf78165a20b8761f5',
                        )
                    ));
                    $resp = curl_exec($curl);
                    curl_close($curl);
                    connectify('success', 'Success', 'Form has been submitted successfully !');
                    return redirect('/');
                } else {
                    return redirect('/');
                }
            }
        } else {
            connectify('error', 'Error', 'Please Filled Captcha !');
            return redirect('/');

        }
    }
     public function blogs(){
       return view('frontend.blog');
    }
     public function blogs1(){
       return view('frontend.blog.why-a-latex-mattress-is-the-best-choice-for-healthy-&-comfortable-sleep');
    }
     public function blogs2(){
       return view('frontend.blog.say-goodbye-to-back-pain-with-the-right-orthopedic-mattress');
    }
     public function blogs3(){
       return view('frontend.blog.the-natural-making-of-a-100%-latex-mattress');
    }
     public function blogs4(){
       return view('frontend.blog.why-a-dr-ortho-mattress-is-the-best-choice-for-back-pain-relief');
    }
     public function blogs5(){
       return view('frontend.blog.what-to-look-for-in-a-mattress');
    }
     public function blogs6(){
       return view('frontend.blog.what-is-an-orthopedic-mattress');
    }
     public function blogs7(){
       return view('frontend.blog.sleepwell-bed-mattress');
    }
     public function blogs8(){
       return view('frontend.blog.choose-the-perfect-mattress');
    }
     public function blogs9(){
       return view('frontend.blog.how-dr-ortho-matress-improve-sleep-quality-and-reduce-back-pain');
    }
     public function blogs10(){
       return view('frontend.blog.memory-foam-vs-orthopedic-mattress-which-one-is-better-for-your-sleep');
    }
   public function contact(){
  
       
       return view('frontend.contact');
    }
    public function subscribers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'EMAIL' => 'required|email|unique:subscribers,email',
        ],
            [
                'EMAIL.required' => 'Please Enter Email ID',
                'EMAIL.email' => 'Please Enter Proper Email',
                'EMAIL.unique' => 'You have Already been Subscribed with us !',
            ]
        );

        if ($validator->fails()) {
            connectify('error', 'Error', $validator->errors()->first());
            return back()->withInput();
        }

        Subscriber::create([
            'email' => $request->EMAIL,
            'status' => true,
        ]);

        connectify('success', 'Subscribed', 'Thank you for Subscribing with us !');

        return back();
    }

    public function getProduct($slug)
    {

        try {

            $product = TxnProduct::where('status', true)->where('slug_url', $slug)->with(['images', 'condition', 'sizes', 'unit', 'colors', 'wishlist', 'category', 'warranty', 'reviews'])->firstOrFail();

            $categoryIds = $product->categories->pluck('id')->toArray();
            if (empty($categoryIds) && $product->category_id) {
                $categoryIds = [$product->category_id];
            }

            $related_products = DB::table('txn_products as p')
                ->selectRaw("p.id as product_id , p.title,w.id as w_id, w.user_id as w_u_id, w.product_id as w_product_id,map.color_id as c_id, map.size_id as s_id,  c.id as cate_id , p.slug_url, p.image_url,map.mrp, map.stock, map.starting_price, p.image_url1, p.status, p.review_status , FLOOR(AVG(r.rating)) as rating , COUNT(Distinct(r.comment)) as total_comment, c.name as category_name, c.slug_url as category_url")
                ->leftJoin("txn_reviews as r", "r.product_id", "p.id")
                ->leftJoin("map_color_sizes as map", "map.product_id", "p.id")
                ->leftJoin("mst_colors as co", "co.id", "map.color_id")
                ->leftJoin("map_category_product as mcp", "mcp.product_id", "p.id")
                ->leftJoin("txn_categories as c", function ($join) {
                    $join->on('c.id', '=', 'mcp.category_id')
                         ->orOn('c.id', '=', 'p.category_id');
                })
                ->leftJoin("wishlists as w", "p.id", "w.product_id")
                ->where('p.status', true)
                ->where('p.id', '<>', $product->id)
                ->whereIn('c.id', $categoryIds)
                ->orderBy('p.id', 'DESC')
                ->groupBy("p.id")
                ->get();

            return view('frontend.newproduct.show', compact('product', 'related_products'));

        } catch (\Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

                connectify('error', 'Error', 'Whoops, Product Not Found !');

                return redirect('/');
            }

            return $ex->getMessage();

            connectify('error', 'Error', 'Whoops, Something Went Wrong from our End !');

            return redirect('/');
        }
    }

    public function getSizes(Request $request)
    {
        $results = MapColorSize::select('mrp', 'starting_price', 'color_id', 'size_id', 'stock')->where('product_id', $request->product_id);

        if ($request->source == 'size') {
            $results = $results->where('size_id', $request->size_id);
        };

        if ($request->source == 'color') {
            $results = $results->where('color_id', $request->color_id)->where('size_id', $request->size_id);
        };

        $results = $results->where('status', true)->orderBy('sort_index', 'asc')->get();

        $images = TxnImage::select('id', 'image_url')->where('product_id', $request->product_id)->orderBy('id', 'DESC')->get();

        $available_sizes = MapColorSize::select('size_id', 'product_id')->where('product_id', $request->product_id)->where('status', true)->with('size')->get();

        $available_colors = MapColorSize::select('color_id', 'product_id')->where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('status', true)->with('color')->get();

        if ($results) {
            return response()->json(['success' => $results, 'images' => $images, 'available_sizes' => $available_sizes, 'available_colors' => $available_colors, 'source' => $request->source]);
        }
        return response()->json(['error' => []]);
    }

    public function verifyPincode(Request $request, LogisticService $logistic)
    {
        $res = $logistic->verify($request->pincode);
        $res1 = json_decode($res, true);
        if (isset($res1['status']) && $res1['status'] == 200) {
            session(['pincode' => $request->pincode]);
            return response()->json(['success' => 'Delivery Available at ' . $request->pincode, 'estimated_date' => $res1['data']['available_courier_companies'][0]['etd']]);
        }
        return response()->json(['error' => 'Delivery Not Available at ' . $request->pincode]);
    }

    

    public function search(Request $request)
    {
        $colors = MstColor::where('status', true)->get();
        $sizes = MstSize::where('status', true)->get();

        if ($request->filled('q')) {

            $products = DB::table('txn_products as p')
                ->selectRaw("p.id , p.title , p.slug_url,w.user_id as w_u_id, w.id as w_id, w.product_id as w_product_id,map.color_id as c_id, map.size_id as s_id , p.image_url, p.image_url1,p.review_status, FLOOR(AVG(r.rating)) as rating , map.mrp, map.starting_price, map.stock, COUNT(Distinct(r.comment)) as total_comment, p.category_id")
                ->leftJoin("txn_reviews as r", "r.product_id", "p.id")
                ->leftJoin("map_color_sizes as map", "map.product_id", "p.id")
                ->leftJoin("mst_colors as c", "c.id", "map.color_id")
                ->leftJoin("txn_keywords as k", "k.product_id", "p.id")
                ->leftJoin("wishlists as w", "p.id", "w.product_id")
                ->where('p.status', '=', true)
                ->where('k.keyword', 'like', '%' . $request->q . '%');
        } else {

            $products = DB::table('txn_products as p')
                ->selectRaw("p.id , p.title , p.slug_url,w.user_id as w_u_id,w.id as w_id, w.product_id as w_product_id,map.color_id as c_id, map.size_id as s_id , p.image_url,p.review_status, p.image_url1, FLOOR(AVG(r.rating)) as rating , map.mrp, map.starting_price, map.stock, COUNT(Distinct(r.comment)) as total_comment, p.category_id")
                ->leftJoin("map_color_sizes as map", "map.product_id", "p.id")
                ->leftJoin("mst_colors as c", "c.id", "map.color_id")
                ->leftJoin("txn_reviews as r", "r.product_id", "p.id")
                ->leftJoin("txn_keywords as k", "k.product_id", "p.id")
                ->leftJoin("wishlists as w", "p.id", "w.product_id")
                ->where('p.status', '=', true);
        }

        if ($request->filled('category') && gettype($request->category) == 'array') {
            $products = $products->where(function ($query) use ($request) {
                $query->whereIn('p.category_id', $request->category)
                      ->orWhereExists(function ($subquery) use ($request) {
                          $subquery->select(DB::raw(1))
                                   ->from('map_category_product')
                                   ->whereRaw('map_category_product.product_id = p.id')
                                   ->whereIn('map_category_product.category_id', $request->category);
                      });
            });
        }

        if ($request->filled('colors') && gettype($request->colors) == 'array') {
            $products = $products->whereIn('map.color_id', $request->colors);
        }

        if ($request->filled('sizes') && gettype($request->sizes) == 'array') {
            $products = $products->whereIn('map.size_id', $request->sizes);
        }

        if ($request->filled('amount')) {
            $replaced_amt = str_replace('₹', '', $request->amount);
            $explode_amt = explode('-', $replaced_amt);
            $products = $products->whereBetween('map.mrp', $explode_amt);
        }

        $products = $products->orderBy('p.id', 'DESC')->groupBy("p.id")->paginate(50);

        $categories = TxnCategory::selectRaw("DISTINCT(name) as category_name, id")->where('status', true)->get();

        return view('frontend.product.index', compact('products', 'categories', 'colors', 'sizes'))->with('input', $request);
    }

    public function filter(Request $request)
    {
        $products = DB::table('txn_products as p')
            ->selectRaw("p.id , p.title , p.slug_url, p.image_url, p.image_url1,FLOOR(AVG(r.rating)) as rating , COUNT(Distinct(r.comment)) as total_comment")
            ->leftJoin("txn_reviews as r", "r.product_id", "p.id")
            ->leftJoin("txn_keywords as k", "k.product_id", "p.id")
            ->where('p.status', '=', true);

        if ($request->filled('brands') && gettype($request->brands) == 'array') {
            $products = $products->whereIn('p.brand_id', $request->brands);
        }

        if ($request->filled('conditions') && gettype($request->conditions) == 'array') {
            $products = $products->whereIn('p.condition_id', $request->conditions);
        }

        $products = $products->orderBy('p.id', 'DESC')->groupBy("p.id")->paginate(20);

        $prodLists = [];

        foreach ($products as $prod) {
            array_push($prodLists, $prod->id);
        }

        $brands = DB::table('txn_products as p')
            ->selectRaw("Distinct(b.id) as id, b.brand_name")
            ->leftJoin("txn_brands as b", "p.brand_id", "b.id")
            ->where('p.status', true)
            ->whereIN('p.id', $prodLists);

        $brands = $brands->groupBy("p.id")->get();

        $conditions = TxnCondition::where('status', true)->get();

        return view('frontend.product.index', compact('products', 'brands', 'conditions'))->with('input', $request);

        // return response()->json(['products' => $products], 200);
    }

    public function cateFilter(Request $request)
    {

        $category = TxnCategory::where('id', $request->category_id)->where('status', true)->firstOrFail();

        $categories = DB::select(DB::raw("select  id
            from    (select * from txn_categories
                     order by parent_id, id) txn_categories,
                    (select @pv := $category->id) initialisation
            where   find_in_set(parent_id, @pv) > 0
            and     @pv := concat(@pv, ',', id)"));

        $cateLists = [];
        $cateLists[0] = $category->id;

        foreach ($categories as $cate) {
            array_push($cateLists, $cate->id);
        }

        $products = DB::table('txn_products as p')
            ->selectRaw("p.id , p.title , p.slug_url , p.image_url, p.image_url1, FLOOR(AVG(r.rating)) as rating , COUNT(Distinct(r.comment)) as total_comment")
            ->leftJoin("txn_reviews as r", "r.product_id", "p.id")
            ->leftJoin("txn_keywords as k", "k.product_id", "p.id")
            ->where('p.status', '=', true)
            ->where(function ($query) use ($cateLists) {
                $query->whereIn('p.category_id', $cateLists)
                      ->orWhereExists(function ($subquery) use ($cateLists) {
                          $subquery->select(DB::raw(1))
                                   ->from('map_category_product')
                                   ->whereRaw('map_category_product.product_id = p.id')
                                   ->whereIn('map_category_product.category_id', $cateLists);
                      });
            });

        $brands = DB::table('txn_products as p')
            ->selectRaw("Distinct(b.id) as id, b.brand_name")
            ->leftJoin("txn_brands as b", "p.brand_id", "b.id")
            ->where('p.status', true)
            ->where(function ($query) use ($cateLists) {
                $query->whereIn('p.category_id', $cateLists)
                      ->orWhereExists(function ($subquery) use ($cateLists) {
                          $subquery->select(DB::raw(1))
                                   ->from('map_category_product')
                                   ->whereRaw('map_category_product.product_id = p.id')
                                   ->whereIn('map_category_product.category_id', $cateLists);
                      });
            })
            ->groupBy("p.id")
            ->get();

        $conditions = TxnCondition::where('status', true)->get();

        if ($request->filled('brands') && gettype($request->brands) == 'array') {
            $products = $products->whereIn('p.brand_id', $request->brands);
        }

        if ($request->filled('conditions') && gettype($request->conditions) == 'array') {
            $products = $products->whereIn('p.condition_id', $request->conditions);
        }

        $products = $products->orderBy('p.id', 'DESC')->groupBy("p.id")->paginate(20);

        return view('frontend.product.cate-products', compact('products', 'category', 'brands', 'conditions'))->with('input', $request);

        // return response()->json(['products' => $products], 200);
    }

    public function getCategoryProducts(Request $request, $slug)
    {
        try {

            $colors = MstColor::where('status', true)->get();
            $sizes = MstSize::where('status', true)->get();
            $category = TxnCategory::where('slug_url', $slug)->where('status', true)->firstOrFail();

            $categories = DB::select(DB::raw("select DISTINCT(name) as category_name, id, parent_id
            from    (select * from txn_categories
                     order by parent_id, id) txn_categories,
                    (select @pv := $category->id) initialisation
            where   find_in_set(parent_id, @pv) > 0
            and parent_id in (40, 41)
            and @pv := concat(@pv, ',', id)
            "));
            // and     @pv := concat(@pv, ',', id)"));

            $cateLists = [];
            $cateLists[0] = $category->id;

            foreach ($categories as $cate) {
                array_push($cateLists, $cate->id);
            }

            $products = DB::table('txn_products as p')
                ->selectRaw("p.id , p.title , p.slug_url,w.user_id as w_u_id,w.id as w_id, w.product_id as w_product_id,map.color_id as c_id, map.size_id as s_id, p.image_url, p.image_url1,p.review_status, map.mrp, map.starting_price, map.stock, p.category_id ,c.parent_id, FLOOR(AVG(r.rating)) as rating , COUNT(Distinct(r.comment)) as total_comment")
                ->leftJoin("map_color_sizes as map", "map.product_id", "p.id")
                ->leftJoin("mst_colors as co", "co.id", "map.color_id")
                ->leftJoin("txn_reviews as r", "r.product_id", "p.id")
                ->leftJoin("txn_categories as c", "p.category_id", "c.id")
                ->leftJoin("wishlists as w", "p.id", "w.product_id")
                ->where('p.status', true)
                ->where(function ($query) use ($cateLists) {
                    $query->whereIn('p.category_id', $cateLists)
                          ->orWhereExists(function ($subquery) use ($cateLists) {
                              $subquery->select(DB::raw(1))
                                       ->from('map_category_product')
                                       ->whereRaw('map_category_product.product_id = p.id')
                                       ->whereIn('map_category_product.category_id', $cateLists);
                          });
                });

            if ($request->filled('category') && gettype($request->category) == 'array') {
                $products = $products->where(function ($query) use ($request) {
                    $query->whereIn('p.category_id', $request->category)
                          ->orWhereExists(function ($subquery) use ($request) {
                              $subquery->select(DB::raw(1))
                                       ->from('map_category_product')
                                       ->whereRaw('map_category_product.product_id = p.id')
                                       ->whereIn('map_category_product.category_id', $request->category);
                          });
                });
            }

            if ($request->filled('colors') && gettype($request->colors) == 'array') {
                $products = $products->whereIn('map.color_id', $request->colors);
            }

            if ($request->filled('sizes') && gettype($request->sizes) == 'array') {
                $products = $products->whereIn('map.size_id', $request->sizes);
            }

            // if ($request->filled('amount')) {
            if ($request->filled('amount') && strpos($request->amount, '₹0 - ₹5000') === false) {
                $replaced_amt = str_replace('₹', '', $request->amount);
                $explode_amt = explode('-', $replaced_amt);
                $products = $products->whereBetween('map.mrp', $explode_amt);
            }

            $products = $products->orderBy('p.id', 'DESC')->groupBy("p.id")->paginate(50);

            return view('frontend.newproduct.category', compact('products', 'category', 'categories', 'colors', 'sizes'))->with('input', $request);

        } catch (\Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

                connectify('error', 'Error', 'Whoops, Category Not Found !');

                return redirect('/');
            }

            connectify('error', 'Error', 'Whoops, Something Went Wrong from our End  !');

            return redirect('/');
        }
    }

    public function askQuestion(Request $request, $id)
    {
        $request->validate(
            [
                'question' => 'required|string',
            ],
            [
                'question.required' => 'Please Enter your question',
            ]
        );

        try {

            $product = TxnProduct::where('id', $id)->firstOrFail();

            $qna = ProductFaq::create([
                'question' => $request->question,
                'product_id' => $product->id,
                'status' => false,
            ]);

            Mail::send(['html' => 'backend.mails.question'], ['qna' => $qna, 'product' => $product], function ($message) {
                $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                $message->to('comfortmattresses50@gmail.com', 'Comfort Mattress');
                $message->to('comfortlatexmattresses1959@gmail.com', 'Comfort Mattress');
                $message->subject('Comfort Mattress - Someone ask question');
            });

            return redirect(route('product', $product->slug_url))->with('messageSuccess1', 'Your question has been submitted successfully ! we\'ll answer your question soon !');

        } catch (\Exception $ex) {

            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

                connectify('error', 'Error', 'Whoops, Category Not Found !');

                return back();
            }

            connectify('error', 'Error', 'Whoops, Something Went Wrong from our End !');

            return back();
        }
    }

    // public function verifyPromocode(Request $request)
    // {
    //     $promo = [];
    //     if ($request->filled('promocode')) {
    //         $promo = TxnUser::select('promocode')->where('elite', true)->where('promocode', $request->promocode)->first();
    //         dd($promo);
    //     } elseif ($request->filled('discountcode')) {
    //         // $promo = MstOffer::select('shop_code')->where('shop_code', strtolower($request->discountcode))->first();
    //         $promo = MstOffer::select('code')->where('code', strtolower($request->discountcode))->first();
    //     }
    //     if (!empty($promo)) {
    //         session(['promocode' => $promo]);
    //         return response()->json(['success' => 'Coupon Applied Successfully !', 'status' => 200], 200);
    //     }
    //     return response()->json(['error' => 'Please Enter Valid Coupon', 'status' => 200], 200);
    // }
    
    public function verifyPromocode(Request $request)
{
    try {
        $promo = [];

        if ($request->filled('discountcode')) {
            $promo = MstOffer::select('code', 'type as coupon_type', 'value as amount')
                ->where('code', strtoupper($request->discountcode)) // your code is in uppercase: COMFORT10
                ->where('is_active', 1)
                ->first();
        }
      if (!empty($promo)) {
    $sessionData = [
        'code' => $promo->code,
        'type' => $promo->coupon_type,
        'value' => floatval($promo->amount),
    ];
    session(['promocode' => $sessionData]);
    return response()->json([
        'success' => 'Coupon Applied Successfully!',
        'data' => [
            'coupon_type' => ($promo->coupon_type === 'percent') ? 0 : 1,
            'amount' => floatval($promo->amount),
        ],
        'status' => 200
    ]);
}
    } catch (\Exception $e) {
        \Log::error('Promo Code Error: '.$e->getMessage());
        return response()->json(['error' => 'Server Error', 'status' => 500], 500);
    }
}


    public function getSizePrice(Request $request)
    {
        try {

            $result = MapColorSize::select('mrp', 'starting_price')->where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->where('status', true)->firstOrFail();

            return response()->json(['success' => $result]);

        } catch (\Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

                return response()->json(['error' => 'Whoops something went wrong !']);
            }
            return response()->json(['error' => 'Whoops something went wrong from our end, try again later !']);
        }
    }

}
