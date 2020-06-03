<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Property;
class PropertyController extends Controller
{
    public function app(){

      //$properties = DB::select(" SELECT * FROM properties ");
	  $properties = Property::all();
      
      
      return view('property.app')->with('properties', $properties);
    }
	
	
	
	public function show($name){
		//$property = DB::select("SELECT * FROM properties WHERE name = ?",[$name]);
		  $property  = Property::WHERE('name', $name)->get();//o name da nossa bd tem de ser igual ao name que esta como parametro na url
		   
		if(!empty($property)){
			
			return view('property.show')->with('property',$property);
			
		}else
		{
			return redirect()->action('PropertyController@create');
		}
	}
	
	
	
    public function create(){

        return view('property.create');
      }

      public function store(Request $request){
		  
		  $propertySlug = $this->setName($request->title);
		  
		  
      /* $property=[ $request->title,
	    $propertySlug,
        $request->description,
        $request->rental_price,
        $request->sale_price,
      ];
        DB::insert("INSERT INTO properties( title, name, description, rental_price, sale_price) VALUES
              (?,?,?,?,?) ", $property);*/
			  
			  $property = [
			    'title'=> $request->title,
				'name'=>$propertySlug ,
				'description'=> $request->description,
				'rental_price'=> $request->rental_price,
				'sale_price'=> $request->sale_price
			  
			  ];
			  
			  Property::create($property);
			  
			  
  return redirect()->action('PropertyController@app');
      }
	  
	  
	  public function edit($name){
		 // $property = DB::select("SELECT * FROM properties WHERE name = ?",[$name]);
		 $property = Property::where('name', $name)->get();
		
		if(!empty($property)){
			
			return view('property.edit')->with('property',$property);
			
		}else
		{
			return redirect()->action('PropertyController@create');
		}
	  }
	  
	  public function update(Request $request, $id){
		  
		  $propertySlug = $this->setName($request->title);
		  
     /*  $property=[ $request->title,
	    $propertySlug,
        $request->description,
        $request->rental_price,
        $request->sale_price,
		$id
      ];
        DB::update("UPDATE properties Set title = ?, name = ?, description=?, rental_price=?
		, sale_price = ?
		 WHERE id=? ", $property);*/
		 
		 $property=Property::find($id);
		 $property->title=$request->title;
		 $property->name= $propertySlug;
		 $property->description=$request->description;
		 $property->rental_price=$request->rental_price;
		 $property->sale_price=$request->sale_price;
		 
		 $property->save();
		 
		 
		   return redirect()->action('PropertyController@app');
		  
	  }
	  
	  public function destroy($name){
		 // $property = DB::select(" SELECT * FROM properties WHERE name = ?",[$name]);
		   $property = Property::where('name',$name);
		  
		  if(!empty($property)){
			 DB::delete(" DELETE FROM properties WHERE name = ?",[$name]) ; 
		  }
		  
		 
		   return redirect()->action('PropertyController@app');
	  }
	  
	  
	  private function setName($title){
		  
		  $propertySlug = str_slug($title);
		 // $properties= DB:: select(' SELECT *FROM properties ');
		  $properties = Property::all();
		  $t=0;
		  foreach($properties as $property){
			  if(str_slug($property->title)===str_slug($propertySlug)){//Compara se ja tem um slug na BD que
				   $t++;												//e igual ao slug que est]a vindo da requisicao e acrescenta o 1 pra deixar diferente
				   
				  
			  }
		  }
		  
		  if( $t>0){
			  $propertySlug = $propertySlug. '-'. $t;
		  }  
				
				return $propertySlug;
		  
	  }
}
