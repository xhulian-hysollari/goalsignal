
<style>

    *{
        font-size: 18px;
    }

    #title {
        height: 40px;
        font-size: 18px;
    }

    .button {
        margin: 20px;

        font-size: 18px;
    }

    select {
        margin-left: 30px;
        font-size: 18px;
    }

    .field {
        padding: 30px;
    }

    #is_featured {
        margin-left: 30px;
    }

</style>

<nav class="panel">
    <div class="field">
        <div class="control">
            <label for="title">{{trans('feeds.title')}}</label>
            <input class="input" type="text" name="title"  id="title" value="{{$results->title}}">
        </div>

        <br>

        <div class="control">
            <label for="body">{{trans('feeds.body')}}</label>
            <textarea name="body" id="body" class="summernote">{{$results->body}}</textarea>
        </div>

        <br>

        <div class="file has-name is-fullwidth">
            <label class="file-label">
                <input class="file-input" type="file" name="image_path[]" id="image_path" value="{{$results->image_path}}" multiple accept="image/*">
                <span class="file-cta">
                    <span class="file-icon">
                    <i class="fa fa-upload"></i>
                    </span>
                    <span class="file-label">
                    {{trans('feeds.image')}}
                    </span>
                </span>
                <span id="filename" class="file-name" ></span>
            </label>
        </div>

        <br>

        <div class="control">
            <label for="category_id">{{trans('feeds.categories')}}</label>

            <select name="category_id" id="category_id">
                @if(isset($resulted) && count($resulted)>0)
                    @if(isset($ownCateg))
                        <option value="{{$ownCateg->id}}">{!! $ownCateg->name !!}</option>
                    @endif
                    @foreach($resulted as $result)
                        <option value="{{$result->id}}">{!! $result->name !!}</option>
                    @endforeach
                    @else
                    <h1>Nothing to be shown</h1>
                @endif
            </select>
        </div>

        <br>

        <div class="control">
            <label for="is_featured">{{trans('feeds.featured')}}</label>
            <input type="checkbox" name="is_featured" id="is_featured" checked="unchecked" value="1">
        </div>

        <br>

        <div class="control">
            <label class="box"><h1 style="color: red">{{trans('feeds.locale')}}</h1></label>
        </div>

        <br>

        <div class="field is-grouped is-grouped-centered">
            <button class="button is-primary is-outlined">{{$button}}</button>
        </div>
    </div>
</nav>

@include('partials.errors')

<script>
    var file = document.getElementById("image_path");
    file.onchange = function(){

        for (var i = 0; i < file.files.length; i++) {
        if(file.files.length > 0)
        {
            document.getElementById('filename').innerHTML += file.files[i].name;
        }

            document.getElementById('filename').innerHTML += ";";
            document.getElementById('filename').innerHTML += "\n";
        }
    };
</script>