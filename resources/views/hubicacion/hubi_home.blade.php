<div class="content row ">

    <div class="col-md-9">
        <div style=" width:100%; height: 700px; align-items:center" id="map"></div>
    </div>
    <div class="col-md-3">
        <div class="block">
            <div class=" block-content">
                <div class=" form-group row">
                    <div class=" col-lg-12">
                        <input type="date" id="ped_fecha" class=" form-control form-control-sm">
                        <select name="" id="ped_usu" class=" form-control form-control-sm">
                            @foreach ($usuarios as $u)
                            <option value="{{$u->id}}">{{$u->usu_nombre}}</option>
                            @endforeach
                        </select>
                        <button onclick="show_list_pedido()" class="btn btn-warning btn-sm btn-block"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            #global {
                height: 580px;
                width: 100%;
                /* border: 1px solid #ddd; */
                /* background: #f1f1f1; */
                overflow-y: scroll;
            }

            #mensajes {
                height: auto;
            }
        </style>
        <!-- Friends -->
        <div class="block" id="global">
            <div class="block-content">
                <ul class="nav-items font-size-sm" id="list_ped">
                </ul>
            </div>
        </div>
        <!-- END Friends -->
    </div>
</div>
<script src="{{ asset('resources/js/hubicacion/hubic_1.js')}}"></script>