@foreach($products as $p)    
    <option value="{{ $p->id }}">{{ $p->product_title }}</option>
@endforeach