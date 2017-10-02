<style>

    *{
        font-size: 18px;
    }

    .button {

        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: -20px;
        font-size: 18px;
    }

    .field {
        padding: 30px;
    }

    #on_footer {
        margin-left: 30px;
    }

</style>

<nav class="panel">

    <div class="field">

        <div class="control">
            <label for="title">{{trans('pages.title')}}</label><br>
            <input onkeypress="sluggish()" onkeyup="sluggish()" class="input is-large" type="text" id="title" name="title" value="{{$results->title}}">
        </div>
        <br>
        <div class="control">
            <label for="slug">{{trans('pages.slug')}}</label><br>
            <input class="input is-large" type="text" id="slug" name="slug" value="{{$results->slug}}">
        </div>
        <br>
        <div class="control">
            <label for="body">{{trans('pages.body')}}</label><br>
            <textarea class="summernote" id="body" name="body">{!! $results->body !!}</textarea>
        </div>
        <br>
        <div class="control">
            <label for="on_footer">{{trans('pages.onFooter')}}</label>
            <input type="checkbox" name="on_footer" id="on_footer" checked="unchecked" value="1">
        </div>

        <br>
        <div class="control">
            <button class="button is-fullwidth is-primary is-outlined">{{$button}}</button>
        </div>

    </div>


</nav>

@include('partials.errors')

<script>
    function sluggish()

    {
        var title = document.getElementById("title");
        var s = title.value;

        var slug = document.getElementById("slug");

        var replacement = s.replace(/ /g, '-');

        slug.value = replacement.toLowerCase();
    }
</script>
