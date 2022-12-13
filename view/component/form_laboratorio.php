<div class="row">
    <div class="col-4">
        <h4 class="text-center text-danger my-1"><< Entrada >></h4>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-secondary fw-bold" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><p>PDF local</p></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary fw-bold" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><p>PDF remoto</p></button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <form class="form form_subir_pdf" id="form_subir_pdf" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="input-group mb-3 border border-success rounded">
                            <input type="file" name="pdf_local" class="form-control text-success" id="inputGroupFile02" required>
                            <label class="input-group-text fw-bold text-success" for="inputGroupFile02">.PDF</label>
                        </div>
                    </div>
                    <?php include("botones_opciones_file_local.php"); ?>
                    <button type="submit" class="btn btn-success">Subir .pdf</button>
                </form>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <form class="form form_subir_pdf_enlace" id="form_subir_pdf_enlace" >
                    <div class="mb-3">
                        <div class="input-group mb-3 border border-success rounded">
                            <input type="text" class="form-control" name="txt_enlace" id="txt_archivo_enlace"1 placeholder="https://" required>
                        </div>
                    </div>
                    <?php include("botones_opciones_file_remoto.php"); ?>
                    <button type="submit" class="btn btn-success">Subir enlace</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-8 ">
        <h4 class="text-center text-danger my-1"><< Salida >></h4>
        <div class="col-12 bg-secondary p-2 text-dark bg-opacity-10 border border-danger p-2 mb-2 border-opacity-25" id="contenedor_salida">
            
        </div>
    </div>
</div>