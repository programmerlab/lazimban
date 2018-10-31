
<div class="col-md-10">

    
     <div class="form-group{{ $errors->first('product_title', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Ürün İsmi <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('product_title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('product_title', ':message') }}</span>
        </div>
    </div>  


    <div class="form-group{{ $errors->first('product_category', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Kategori Seç  <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            
                {!! $categories !!}

            <span class="label label-danger">{{ $errors->first('product_category', ':message') }}</span>
        </div>
    </div> 

     <div class="form-group{{ $errors->first('qty', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Ürün miktarı <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('qty',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('qty', ':message') }}</span>
        </div>
    </div> 
 
     <div class="form-group{{ $errors->first('price', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Ürün Fiyatı <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('price',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('price', ':message') }}</span>
        </div>
    </div> 


      <div class="form-group{{ $errors->first('discount', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> İndirim Oranı (%)</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('discount',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('discount', ':message') }}</span>
        </div>
    </div> 
     <div class="form-group{{ $errors->first('short_description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Ürün Kısa açıklama </label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('short_description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('short_description', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
     <div class="form-group{{ $errors->first('description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Ürün Açıklaması </label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('description', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 
      <div class="form-group{{ $errors->first('brand', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Ürün markası </label>
        <div class="col-lg-8 col-md-8"> 
            <!--{!! Form::text('brand',null, ['class' => 'form-control form-cascade-control input-small'])  !!}-->
            <select name="brand" class="form-control">          
               <option value="">Select Brand</option>
                    @foreach($brand as $br)
                         <option value="{{ strtolower($br->title) }}" {{ ($product->brand == strtolower($br->title)) ? 'selected' : '' }}>{{ ucwords($br->title) }}</option>
                    @endforeach          
            </select>
            <span class="label label-danger">{{ $errors->first('brand', ':message') }}</span>
        </div>
    </div>
 
     <div class="form-group{{ $errors->first('image', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Ürün Resmi</label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('image',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
             @if(!empty($product->photo))
                 <img src="{!! Url::to('storage/uploads/products/'.$product->photo) !!}" width="100px">
                 <input type="hidden" name="photo" value="{!! $product->photo !!}">
             @endif                                       
            <span class="label label-danger">{{ $errors->first('image', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    <div class="form-group{{ $errors->first('additional_image', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Ürün İlave Resimler</label>
        <div class="col-lg-8 col-md-8">  
             
             <input type="file" name="additional_image[]" class="form-control form-cascade-control input-small" multiple>
             <br>
             @if(!empty($product->additional_images))
                @foreach(json_decode($product->additional_images) as $rows)
                    <img src="{!! Url::to('storage/uploads/products/'.$rows) !!}" width="100px">
                @endforeach
                    <input type="hidden" name="additional_images[]" value="">                    
             @endif                                       
            <span class="label label-danger">{{ $errors->first('additional_image', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    <?php
    $size = [];
    if(isset(json_decode($product->options)->size)){
    $size = (json_decode($product->options)->size);
    }
    ?>
    <?php
    $color = [];
    if(isset(json_decode($product->options)->color)){
    $color = (json_decode($product->options)->color);
    }
    ?>
    <?php
    $quantity = [];
    if(isset(json_decode($product->options)->quantity)){
    $quantity = (json_decode($product->options)->quantity);
    }
    ?>
    <!--<div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"> Ürün boyutu (<small>Birden çok boyut seçmek için kontrol tuşunu kullanın</small>)</label>
        <div class="col-lg-8 col-md-8"> 
            <select class="form-control" name="size[]" multiple="multiple">
               
               <option value="s" <?php echo (in_array('s',$size)) ? 'selected' : ''; ?>>S</option>
               <option value="m" <?php echo (in_array('m',$size)) ? 'selected' : ''; ?>>M</option>
               <option value="l" <?php echo (in_array('l',$size)) ? 'selected' : ''; ?>>L</option>
               <option value="xl" <?php echo (in_array('xl',$size)) ? 'selected' : ''; ?>>XL</option>
               <option value="xxl" <?php echo (in_array('xxl',$size)) ? 'selected' : ''; ?>>XXL</option>
            </select>
            <span class="label label-danger"></span>
        </div>
    </div>-->
    <!--<?php  ?>-->
     <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"> Ürün boyutu (<small>Birden çok boyut seçmek için kontrol tuşunu kullanın</small>)</label>
        <div class="col-lg-8 col-md-8"> 
               <input type="button" class="btn btn-primary" id="add_more_milestone" value="Add Multiple Variation"/>
               <input type="hidden" name="milestone_field" id="milestone_field" value="1"/>
               <div id="milestone_upload_section">
                    @if(isset($variations) && !empty($variations))
                         @foreach($variations as $key=>$s)
                              <div class='row' style='margin:5px'>
                              <div class='col-sm-3' style='padding-right:20px'>
                              <div class='form-group'>
                              <label class='control-label'>Size</label>
                              <select class='form-control milestone' id='"+img_count+"' name='size[]'>
                              <option value=''>Select Size</option>
                              <option value='xxs' {{ ($s->size=='xxs') ? 'selected' : '' }}>XXS</option>     
                              <option value='xs' {{ ($s->size=='xs') ? 'selected' : '' }}>XS</option>
                              <option value='s' {{ ($s->size=='s') ? 'selected' : '' }}>S</option>
                              <option value='m' {{ ($s->size=='m') ? 'selected' : '' }}>M</option>
                              <option value='l' {{ ($s->size=='l') ? 'selected' : '' }}>L</option>
                              <option value='xl' {{ ($s->size=='xl') ? 'selected' : '' }}>XL</option>
                              <option value='xxl' {{ ($s->size=='xxl') ? 'selected' : '' }}>XXL</option>
                              <option value='xxxl' {{ ($s->size=='xxxl') ? 'selected' : '' }}>XXXL</option>
                              <option value='24' {{ ($s->size=='24') ? 'selected' : '' }}>24'</option>
                              <option value='32' {{ ($s->size=='32') ? 'selected' : '' }}>32'</option>          
                              </select>                
                              </div>
                              </div>
                              
                              <div class='col-sm-6' style='padding-right:20px'>
                              <div class='form-group'>
                              <label class='control-label'>Color</label>
                              <input class="jscolor form-control" value="{{ ($s->color) }}" id="{{ ($s->color) }}" name='color[]'>
                              <p style="background-color:#f00; width:10px; float:left; margin:3px;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#f00'; document.getElementById('{{ ($s->color) }}').value = '#f00';">&nbsp;</p>
                              <p style="background-color:#000; width:10px; float:left; margin:3px;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#000'; document.getElementById('{{ ($s->color) }}').value = '#000';">&nbsp;</p>
                              <p style="background-color:#FFFFFF; width:10px; float:left; margin:3px; border:1px solid;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#FFFFFF'; document.getElementById('{{ ($s->color) }}').value = '#FFFFFF';">&nbsp;</p>
                              <p style="background-color:#F0F; width:10px; float:left; margin:3px;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#F0F'; document.getElementById('{{ ($s->color) }}').value = '#F0F';">&nbsp;</p>
                              <p style="background-color:#06F; width:10px; float:left; margin:3px;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#06F'; document.getElementById('{{ ($s->color) }}').value = '#06F';">&nbsp;</p>
                              <p style="background-color:#FFD700; width:10px; float:left; margin:3px;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#FFD700'; document.getElementById('{{ ($s->color) }}').value = '#FFD700';">&nbsp;</p>
                              <p style="background-color:#96F; width:10px; float:left; margin:3px;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#96F'; document.getElementById('{{ ($s->color) }}').value = '#96F';">&nbsp;</p>
                              <p style="background-color:#777777; width:25px; float:left; margin:3px; border:1px solid;" onclick="document.getElementById('{{ ($s->color) }}').style.background = '#777777'; document.getElementById('{{ ($s->color) }}').value = '777777';">Mix</p>                              
                              </div>
                              </div>
                              
                              
                              <div class='col-sm-2' style='padding-right:20px'>
                              <div class='form-group'>
                              <label class='control-label'>Quantity</label>
                              <input type='number' class='form-control milestone' id='"+img_count+"' name='quantity[]' placeholder='quantity' value="{{ $s->quantity }}" required/>
                              </div>
                              </div>
                              
                              <div class='col-sm-1' style='padding-right:20px'>
                              <label class='control-label'>&nbsp;</label>
                              <div class='form-group'>
                              &nbsp;<img src='http://mactosys.com/allAboutTheMusic/assets/dist/img/bt_delete.png' style='cursor:pointer; height:10px; width:10px;' title='Remove variation' class='remove_img_div'/>
                              </div>
                              </div>
                              </div>
                         @endforeach
                    @endif     
               </div>           
            <span class="label label-danger"></span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('shipping_charge', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Kargo Ücretleri <small>(ücretsiz gönderim sunuluyorsa boş bırakın) </small> <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('shipping_charge',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('shipping_charge', ':message') }}</span>
        </div>
    </div> 
    <!--<div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"> Ürün rengi (<small>Birden çok renk seçmek için kontrol tuşunu kullanın</small>)</label>
        <div class="col-lg-8 col-md-8"> 
            <select class="form-control" name="color[]" multiple="multiple">
               
               <option value="Black" <?php echo (in_array('Black',$color)) ? 'selected' : ''; ?>>Black</option>
               <option value="Blue" <?php echo (in_array('Blue',$color)) ? 'selected' : ''; ?>>Blue</option>
               <option value="Brown" <?php echo (in_array('Brown',$color)) ? 'selected' : ''; ?>>Brown</option>
               <option value="Dark-Blue" <?php echo (in_array('Dark-Blue',$color)) ? 'selected' : ''; ?>>Dark Blue</option>
               <option value="Golden" <?php echo (in_array('Golden',$color)) ? 'selected' : ''; ?>>Golden</option>
               <option value="Green" <?php echo (in_array('Green',$color)) ? 'selected' : ''; ?>>Green</option>
               <option value="Grey" <?php echo (in_array('Grey',$color)) ? 'selected' : ''; ?>>Grey</option>
               <option value="Khaki" <?php echo (in_array('Khaki',$color)) ? 'selected' : ''; ?>>Khaki</option>
               <option value="Light-Blue" <?php echo (in_array('Light-Blue',$color)) ? 'selected' : ''; ?>>Light Blue</option>
               <option value="Magento" <?php echo (in_array('Magento',$color)) ? 'selected' : ''; ?>>Magento</option>
               <option value="Maroon" <?php echo (in_array('Maroon',$color)) ? 'selected' : ''; ?>>Maroon</option>
               <option value="Multicolor" <?php echo (in_array('Multicolor',$color)) ? 'selected' : ''; ?>>Multicolor</option>
               <option value="Orange" <?php echo (in_array('Orange',$color)) ? 'selected' : ''; ?>>Orange</option>
               <option value="Pink" <?php echo (in_array('Pink',$color)) ? 'selected' : ''; ?>>Pink</option>
               <option value="Purple" <?php echo (in_array('Purple',$color)) ? 'selected' : ''; ?>>Purple</option>
               <option value="Red" <?php echo (in_array('Red',$color)) ? 'selected' : ''; ?>>Red</option>
               <option value="Silver" <?php echo (in_array('Silver',$color)) ? 'selected' : ''; ?>>Silver</option>
               <option value="White" <?php echo (in_array('White',$color)) ? 'selected' : ''; ?>>White</option>
               <option value="Yellow" <?php echo (in_array('Yellow',$color)) ? 'selected' : ''; ?>>Yellow</option>
               
            </select>
            <span class="label label-danger"></span>
        </div>
    </div>-->
    <div class="form-group{{ $errors->first('video', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Ürün Video Link (Youtube)</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('video',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('video', ':message') }}</span>
        </div>
    </div>
    @if(Session::get('current_vendor_type') == '1') 
    <div class="form-group{{ $errors->first('slug', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Custom Url <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('slug',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('slug', ':message') }}</span>
        </div>
    </div> 

     <div class="form-group{{ $errors->first('meta_key', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Meta Key <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('meta_key',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('meta_key', ':message') }}</span>
        </div>
    </div> 


     <div class="form-group{{ $errors->first('meta_description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Meta Description<span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('meta_description',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('meta_description', ':message') }}</span>
        </div>
    </div>
    
    <div class="form-group{{ $errors->first('canonical_tag', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Canonical Url<span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('canonical_tag',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('canonical_tag', ':message') }}</span>
        </div>
    </div> 

    <div class="form-group{{ $errors->first('title', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Title <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('title', ':message') }}</span>
        </div>
    </div>
     <div class="form-group{{ $errors->first('is_indexing', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Is Indexing <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8">             
            <select name="is_indexing" class="form-control">
               <option value="1" {{ ($product->is_indexing == '1') ? 'selected' : '' }}>Yes</option>
               <option value="0" {{ ($product->is_indexing == '0') ? 'selected' : '' }}>No</option>
            </select>
            <span class="label label-danger">{{ $errors->first('is_indexing', ':message') }}</span>
        </div>
    </div>
     
     @else
     <input type="hidden" name="is_indexing" value="1">
     
     @endif 
    
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' KAYDET ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('product')}}">
            {!! Form::button('Geri', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
