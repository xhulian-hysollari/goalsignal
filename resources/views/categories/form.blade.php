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

</style>

<nav class="panel">
    <div class="field">
        <div class="control">

            {{--Name of the category:--}}

            <label for="name">{{trans('categories.name')}}</label><br>

            <input class="input is-large" type="text" name="name" id="name" value="{{$categ->name}}" onkeyup="sluggish()" onkeypress="sluggish()">
        </div>

        <br>

        <div class="control">

            {{--Url:--}}

            <label for="url">{{trans('categories.url')}}</label><br>
            <input class="input is-large" type="text" name="url" id="url" value="{{$categ->url}}">
        </div>

        <br>

        <div class="control">

            {{--Optional:--}}

            <label for="optional">{{trans('categories.optional')}}</label><br>
            <input class="input is-large" type="color" name="optional" id="optional" value="{{$categ->optional}}">
        </div>

        <br>

        <div class="control">
            <label for="on_header">{{trans('categories.header')}}</label>
            <input type="checkbox" name="on_header" id="on_header" value="1">
        </div>

        <br>

        <div class="control">
            <label class="box"><h1 style="color: red">{{trans('categories.locale')}}</h1></label>
        </div>

        <br>

        <div class="control">
            <button type="submit" class="button is-primary is-fullwidth">{{$button}}</button>
        </div>
    </div>
</nav>

@include('partials.errors')

<script>
    function sluggish()
    {
        var name = document.getElementById("name");
        var s = name.value;

        var url = document.getElementById("url");

        var replacement = s.replace(/ /g, '-');

        url.value = replacement.toLowerCase();
    }
</script>
