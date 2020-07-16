@extends('back.layout')

@section('css')
<style>
.content {
width: 30%;  
}
</style>  
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                    @if (session('card-updated'))
                        @component('back.components.alert')
                            @slot('type')
                                success
                            @endslot
                            {!! session('card-updated') !!}
                        @endcomponent
                    @endif                      
                      <table>
                         <thead>
                          <tr>
                            @auth
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            @endauth
                            <td>User Name</td>
                            <td>Card Number</td>                            
                            <td>Card Name</td>
                            <td>Card Type</td>
                            <td>Card Title</td>                            
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('back.brick-standard')
                             @php
                             //print_r($cards)
                             @endphp
                         </tbody>    
                       </table>
                     </div>
                     <hr>                       
                   </div>  
                 </div>
              </div> 
           </div>         

@endsection

@section('js')
<script src="{{ asset('public/js/mine.js') }}"></script>
<script>
   $(document).ready(function(){
      $('.listbuttonremove').click(function(){
         BaseRecord.destroy($(this).attr('id'));
         return false;
      });
   });
</script>
@endsection
