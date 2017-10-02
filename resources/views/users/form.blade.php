<?php

use App\User;

$us = User::all();

?>

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

    select {
        margin-left: 30px;
        font-size: 18px;
    }


</style>

<nav class="panel">
    <div class="field">
        <div class="control">
            <label for="name">{{trans('users.username')}}: </label><br>
            <input class="input is-large" type="text" id="name" name="name" value="{!! $users->name !!}" required>
        </div>

        <br>

        <div class="control">
            <label for="email">{{trans('users.email')}}: </label><br>
            <input class="input is-large" type="text" id="email" name="email" value="{!! $users->email !!}" required>
        </div>

        <br>

        <div class="control">
            <label for="password">{{trans('users.password')}}: </label><br>
            <input class="input is-large" type="password" id="password" name="password" value="" required>
        </div>

        <br>

        <div class="control">
            <label for="password-confirm">{{trans('users.confirmPassword')}}: </label><br>
            <input class="input is-large" id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <br>

        @if(count($us) != 0)
            @if(Auth::user()->role === "Admin" && Auth::user()->id != $users->id)
                @if($disabled == 'true')

                @else
                    <div class="control">
                        <label for="is_active">{{trans('users.isActive')}}</label>
                        <select name="is_active" id="is_active">

                            @if($activated == 1) {
                            <option value="active">{{trans('users.active')}}</option>
                            <option value="inactive">{{trans('users.inactive')}}</option>
                            }

                            @elseif($activated == 0) {
                            <option value="inactive">{{trans('users.inactive')}}</option>
                            <option value="active">{{trans('users.active')}}</option>
                                }

                                @endif

                        </select>
                    </div>
                @endif
            @endif
        @else

        @endif
        <br>

        <div class="control">
            <button type="submit" class="button is-primary is-fullwidth">{{$button}}</button>
        </div>
    </div>
</nav>

@include('partials.errors')