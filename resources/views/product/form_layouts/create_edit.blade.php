<div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Product name" value="{{ $product->title ?? ''}}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $product->description ?? ''}}">
</div>
<div class="form-group">
    <textarea class="form-control" name="content" placeholder="Content">{{ $product->content ?? ''}}</textarea>
</div>
<div class="form-group">
    <input type="number" step="any" class="form-control" name="price" placeholder="Price" value="{{ $product->price ?? ''}}">
</div>
<div class="form-group">
    <input name="count" type="number" class="form-control" placeholder="Count on stock" value="{{ $product->count ?? ''}}">
</div>
<div class="form-group">
    <select class="form-control select2" name="group_id" style="width: 100%;">
        <option selected="selected" disabled>Choose group</option>
        @foreach($groups as $group)
            <option
                @if(isset($product->group_id) && $group->id == $product->group_id) selected @endif
                value="{{ $group->id }}">{{ $group->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <select class="form-control select2" name="category_id" style="width: 100%;">
        <option selected="selected" disabled>Choose the category</option>
        @foreach($categories as $category)
            <option
                @if(isset($product->category_id) && $category->id == $product->category_id) selected @endif
                value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <select class="tags" multiple="multiple" name="colors[]" data-placeholder="Select a Color" style="width: 100%;">
        @foreach($colors as $key => $color)
            @if(isset($product))
                @foreach($product->colors as $colorOfProduct)
                <option
                    @if($color->id == $colorOfProduct->id) selected @endif
                    value="{{ $color->id }}">{{ $color->title }}</option>
                @endforeach
            @else
                <option value="{{ $color->id }}">{{ $color->title }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <select class="colors" multiple="multiple" name="tags[]" data-placeholder="Select a Tags" style="width: 100%;">
        @foreach($tags as $tag)
            @if(isset($product))
                @foreach($product->tags as $tagOfProduct)
                    <option
                        @if($tag->id == $tagOfProduct->id) selected @endif
                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            @else
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endif
        @endforeach
    </select>
</div>
@if(isset($product->preview_image))
<div class="form-group">
    <image style="width: 50%" src="{{ $product->getImageUrlAttribute() }}"/>
</div>
@endif
<div class="form-group">
    <label for="exampleInputFile">File input</label>
    <div class="input-group">
        <div class="custom-file">
            <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>
</div>
