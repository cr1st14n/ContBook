<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Catalogo De productos </h3>
            <div class="block-options">
                <div class="block-options-item">
                    <button class="btn btn-secondary btn-sm btn-rounded" onclick="listCatalogo()"><i class="fa fa-fw fa-cuttlefish"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;">
                                    <i class="far fa-code"></i>
                                </th>
                                <th>N. Generico</th>
                                <th style="width: 30%;">N. Comercial</th>
                                <th style="width: 10%;">Stock</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyListCatalogo">
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar48" src="{{ asset('resources/plantilla/assets/media/avatars/logo_1.jpg') }}" alt="">
                                </td>
                                <td class="font-w600 font-size-sm">
                                    <a href="be_pages_generic_profile.html">Alice Moore</a>
                                </td>
                                <td class="font-size-sm">client1<em class="text-muted">@example.com</em></td>
                                <td>
                                    <span class="badge badge-warning">0</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Page Container -->
    </div>
</div>