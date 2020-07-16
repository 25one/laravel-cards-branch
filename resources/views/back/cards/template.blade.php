@extends('back.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            @if (session('card-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('card-ok') !!}
                @endcomponent
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    @yield('form-open')
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label for="name">@lang('Number Card')</label>
                            <input type="text" class="form-control" id="number" name="number" value="@if(isset($card)){{$card->number}}@elseif(old('number')){{old('number')}}@endif" placeholder="7777 7777 7777 7777"> 
                            {!! $errors->first('number', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label for="type">@lang('Type Card')</label>
                            <select class="form-control" name="card_id" id="card_id">
                               @foreach($types as $type)
                                  <option value="{{$type->id}}"
                                  @if(old('card_id') && old('card_id') == $type->id) 
                                     {{'selected'}}
                                  @elseif(isset($card) && $card->card_id == $type->id) 
                                     {{'selected'}} 
                                  @endif
                                    >{{$type->name}}</option>
                               @endforeach                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user">@lang('User')</label>
                            <select class="form-control" name="user_id" id="user_id">
                               @foreach($users as $user)
                                  <option value="{{$user->id}}"
                                  @if(old('user_id') && old('user_id') == $user->id) 
                                     {{'selected'}}
                                  @elseif(isset($card) && $card->user_id == $user->id) 
                                     {{'selected'}}                                      
                                  @endif
                                    >{{$user->name}}</option>
                               @endforeach    
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
@endsection

