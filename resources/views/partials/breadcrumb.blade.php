<div class="page_title">
    <div class="page-wrapper">
        <div class="col-md-6"><h1>{{ isset($category)?$category:''}}</h1>   </div>
        <div class="col-md-6 text-right">
                <span><a href="{{ url('/') }}">Anasayfa</a> </span>
                @if(isset($category_name) && !isset($product->category->name))                                
 
                    @else
                <span> <?php
                        $c = explode('>',$helper->getBreadcrumbs($product->category->id));
                        foreach($c as $row){ ?>                            
                             <a href="{{ isset(explode(';',$row)[1]) ? url(explode(';',$row)[1]) : '' }}">{{ (explode(';',$row)[0]) ? '&nbsp;&nbsp;&nbsp;'.explode(';',$row)[0].'' : '' }}</a>
                        <?php }  ?>
                       
                        {{$product->category->name or ''}} > {{ $product->product_title or ''}}</span>
                @endif                    
                <span>
                <?php if(isset($category)) { ?>                    
                    <a href="{{ (explode(';',$helper->getBreadcrumbs($category))[0])  }}">{{ explode(';',$helper->getBreadcrumbs($category))[0].' >' }} </a> 
                <?php } ?>
                {{ isset($category)?$category:''}} </span>
                    
           </div>
    </div>
</div>