<option value="0">Todas</option>
@foreach($category->subcategories as $subcategory)
    <option value="{{$subcategory->id}}">{{$subcategory->name_es}}</option>
@endforeach