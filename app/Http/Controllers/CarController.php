<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarDetail;
use Illuminate\Http\Request;
use App\Models\Slug;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        $pageName = 'Sản phẩm';
        return view('admin.cars.index' , compact('cars' , 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        return view('admin.cars.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        $slug = Str::slug($request->name, '-');

        $car = Car::create([
            "post_id" =>"0",
            "slug" => $slug,
            "name" => $request->name,
            "brand" =>  $request->brand,
            "model"=> $request->model,
            "year" =>  $request->year,
            "price" =>  $request->price,
            "type" =>  $request->type,
        ]);


               // Lấy tất cả các giá trị ngoại trừ 'field4' và 'field5'
               $variable = $request->except([ 'name','brand','slug' , 'model', 'year', 'price','type','option','_token','colorlist']);
               if(isset($variable)){
                   $jsonString = json_encode($variable);
                   $CarDetail = CarDetail::create([
                    "car_id" =>$car->id,
                    "key" => $request->option,
                    "value" => $jsonString,
                    "color" => json_encode($request->colorlist),
                ]);
               }


        return redirect()->route('cars.show', ['car' => $car->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
            //
        $detail = CarDetail::where('car_id',$car->id)->first();

        return view('admin.cars.show',compact('car','detail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //()
        $detail = CarDetail::where('car_id',$car->id)->first();

        return view('admin.cars.edit', compact('car','detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car , CarDetail $detail)
    {
        //
        $slug = Str::slug($request->name, '-');
        // Cập nhật giá trị thuộc tính 'slug' của car
        $car->fill(['slug' => $slug]);
        $car->save();

        $car->update($request->all());

        $variable = $request->except([ 'name','brand','slug' , 'model', 'year', 'price','type','option','_token','colorlist','_method']);
        $jsonString = json_encode($variable);
        $detail->update([
            "key" => $request->option,
            "value" => $jsonString,
            "color" => json_encode($request->colorlist),
        ]);

        return redirect()->route('cars.show', ['car' => $car->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
        $detail = CarDetail::where('car_id',$car->id)->first();

        $slug = Slug::where('key', $car->slug)->first();

        if ($slug) {
            $slug->delete();
        }

        if ($detail) {
            $detail->delete();
        }

        $car->delete();

        return redirect()->route('cars.index');
    }
}
