    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <i class="fas fa-file-signature mr-2"></i>
                <strong>Akta Pendirian Usaha -
                    <span class="text-secondary">Kreatif Intelegensi Teknologi</span>
                </strong>
            </div>

            <div class="card-body">
                <div class="card card-primary card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-aktadiri-tab" data-toggle="pill" href="#custom-tabs-four-aktadiri" role="tab" aria-controls="custom-tabs-four-aktadiri" aria-selected="true">
                                    <strong>
                                        <i class="far fa-file-word mr-2"></i>
                                        Akta Pendirian
                                    </strong>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-aktaubah-tab" data-toggle="pill" href="#custom-tabs-four-aktaubah" role="tab" aria-controls="custom-tabs-four-aktaubah" aria-selected="true">
                                    <strong>
                                        <i class="far fa-file-powerpoint mr-2"></i>
                                        Akta Perubahan
                                    </strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-aktadiri" role="tabpanel" aria-labelledby="custom-tabs-four-aktadiri-tab">
                                <div class="card card-outline card-danger">
                                    <div class="card-header">
                                        <i class="fas fa-file-alt mr-2"></i>
                                        <strong>Form Akta Pendirian</strong>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-warning btn-sm" disabled>
                                                <i class="fas fa-edit mr-2"></i>
                                                Edit Changes
                                            </button>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="card-body">
                                            <table class="table table-sm table-bordered">
                                                <tr>
                                                    <td class="col-sm-2 bg-light">
                                                        <label for="#" class="col-sm-12 col-form-label">
                                                            Nomor Akta
                                                        </label>
                                                    </td>
                                                    <td class="col-sm-4">
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-sm" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="col-sm-2 bg-light">
                                                        <label for="#" class="col-sm-12 col-form-label">
                                                            Tanggal Akta
                                                        </label>
                                                    </td>
                                                    <td class="col-sm-4">
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                            </div>
                                                        </div>
                                        </div>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    Notaris
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    Upload Dokumen
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <!-- <span class="input-group-text bg-primary"><i class="fas fa-upload"></i></span> -->
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-upload"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    File Dokumen
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        Dokumen Akta Pendirian.pdf
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="col-sm-6" colspan="2">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="fas fa-lock mr-2"></i>
                                                    Enkripsi Doc
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" disabled>
                                                    <i class="fas fa-unlock-alt mr-2"></i>
                                                    Dekripsi Doc
                                                </button>
                                            </td>
                                        </tr>
                                        </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-sm" disabled>
                                        <i class="fas fa-save mr-2"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fas fa-ban mr-2"></i>
                                        Cancel
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-aktaubah" role="tabpanel" aria-labelledby="custom-tabs-four-siup-aktaubah">
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong>Form Akta Perubahan</strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm" disabled>
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Akta Perubahan
                                                    </label>
                                                </td>
                                                <td class="col-sm-4">
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Tanggal Akta Perubahan
                                                    </label>
                                                </td>
                                                <td class="col-sm-4">
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                    </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label for="#" class="col-sm-12 col-form-label">
                                                Notaris
                                            </label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label for="#" class="col-sm-12 col-form-label">
                                                Upload Dokumen
                                            </label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <!-- <span class="input-group-text bg-primary"><i class="fas fa-upload"></i></span> -->
                                                        <button type="button" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-upload"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label for="#" class="col-sm-12 col-form-label">
                                                File Dokumen
                                            </label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-file-pdf mr-2"></i>
                                                    Dokumen Akta Perubahan.pdf
                                                </a>
                                            </div>
                                        </td>
                                        <td class="col-sm-6" colspan="2">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fas fa-lock mr-2"></i>
                                                Enkripsi Doc
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" disabled>
                                                <i class="fas fa-unlock-alt mr-2"></i>
                                                Dekripsi Doc
                                            </button>
                                        </td>
                                    </tr>
                                    </table>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary btn-sm" disabled>
                                    <i class="fas fa-save mr-2"></i>
                                    Save Changes
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="fas fa-ban mr-2"></i>
                                    Cancel
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->