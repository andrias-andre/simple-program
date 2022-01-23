<div class="row">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">&nbsp; <span><i class="fas fa-database"></i> &nbsp; Data</span></li>
    <li class="breadcrumb-item active text-primary" aria-current="page">Company</li>
  </ol>
</nav>
</div>

<div class="row m-4">

    <div class="card col shadow mb-4">
        <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">DATA COMPANY</h5></div>
            <div class="card-body">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addNewCompanyModal"><i class="fas fa-plus"></i> &nbsp; NEW</button>
                <div class="table-responsive">
                    <table
                            id="table-company"
                            class="table table-bordered table-hover text-dark"
                            data-search="true"
                            data-search-highlight="true"
                            data-click-to-select="true"
                            data-pagination="true"
                            data-sort-name="code"
                            data-sort-order="asc"
                            data-cookie="true"
                            data-cookie-id-table="saveCompanyId"
                            data-url="<?= base_url('company/show'); ?>"
                            data-page-size="50">
                        <thead>
                            <tr class="text-center">
                            <th class="py-2" data-align="center" data-width="65" data-field="no">No</th>
                            <th class="py-2" data-align="center" data-field="code">CODE</th>
                            <th class="py-2" data-align="left"   data-field="name">NAME</th>
                            <th class="py-2" data-align="left"  data-field="address">ADDRESS</th>
                            <th class="py-2" data-align="center"  data-field="telp">TELP</th>
                            <th class="py-2" data-align="center"  data-field='mobile'>MOBILE</th>
                            <th class="py-2" data-align="left"  data-field='email'>EMAIL</th>
                            <th class="py-2" data-align="left" " data-field='contact'>CONTACT</th>
                            <th class="py-2" data-align="center" data-width="280" data-field='option'>OPTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>




<div class="modal text-dark fade" id="addNewCompanyModal" tabindex="-1" role="dialog" aria-labelledby="addNewCompanyModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCompanyModalLabel">Form New Company</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

            <input type="hidden" id="csrfToken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" >

            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="codeCompanyAdd" class="col-form-label">Code :</label>
                    <input type="text" class="form-control" id="codeCompanyAdd" name="codeCompanyAdd" autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="nameCompanyAdd" class="col-form-label">Name :</label>
                    <input type="text" class="form-control" id="nameCompanyAdd" name="nameCompanyAdd" autocomplete="off" required>
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="telpCompanyAdd" class="col-form-label">Telp :</label>
                    <input type="text" class="form-control  " id="telpCompanyAdd" name="telpCompanyAdd" required autocomplete="off" >
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="mobileCompanyAdd" class="col-form-label">Mobile :</label>
                    <input type="text" class="form-control " id="mobileCompanyAdd" name="mobileCompanyAdd" autocomplete="off" required>
                    </div>
                </div>

            </div>



            <div class="row">

                <div class="col">
                <div class="form-group">
                <label for="emailCompanyAdd" class="col-form-label">Email :</label>
                <input type="text" class="form-control  " id="emailCompanyAdd" name="emailCompanyAdd" autocomplete="off" >
                </div>
                </div>

                <div class="col">
                <div class="form-group">
                <label for="contactCompanyAdd" class="col-form-label">Contact :</label>
                <input type="text" class="form-control " id="contactCompanyAdd" name="contactCompanyAdd" autocomplete="off"  required>
                </div>
                </div>

            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="addressCompanyAdd" class="col-form-label">Address :</label>
                    <textarea class="form-control  " id="addressCompanyAdd" name="addressCompanyAdd" required></textarea>
                    </div>
                </div>


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCompany" name="btnSaveCompany" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; SAVE</button>
        </div>
      
    </div>
  </div>
</div>

<div class="modal text-dark fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCompanyModalLabel">Form Edit Company</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
        
            <input type="hidden" name="idCompanyEdit" id="idCompanyEdit">
          
            <input type="hidden" name="originalCodeEdit" id="originalCodeEdit">
          
            
            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="codeCompanyEdit" class="col-form-label">Code :</label>
                    <input type="text" class="form-control" id="codeCompanyEdit" name="codeCompanyEdit" autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="nameCompanyEdit" class="col-form-label">Name :</label>
                    <input type="text" class="form-control" id="nameCompanyEdit" name="nameCompanyEdit" autocomplete="off" required>
                    </div>
                </div>


                </div>


                <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="telpCompanyEdit" class="col-form-label">Telp :</label>
                    <input type="text" class="form-control  " id="telpCompanyEdit" name="telpCompanyEdit" required autocomplete="off" >
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="mobileCompanyEdit" class="col-form-label">Mobile :</label>
                    <input type="text" class="form-control " id="mobileCompanyEdit" name="mobileCompanyEdit" autocomplete="off" required>
                    </div>
                </div>

                </div>



                <div class="row">

                <div class="col">
                <div class="form-group">
                <label for="emailCompanyEdit" class="col-form-label">Email :</label>
                <input type="text" class="form-control " id="emailCompanyEdit" name="emailCompanyEdit" autocomplete="off" >
                </div>
                </div>

                <div class="col">
                <div class="form-group">
                <label for="contactCompanyEdit" class="col-form-label">Contact :</label>
                <input type="text" class="form-control " id="contactCompanyEdit" name="contactCompanyEdit" autocomplete="off"  required>
                </div>
                </div>

                </div>


                <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="addressCompanyEdit" class="col-form-label">Address :</label>
                    <textarea class="form-control" id="addressCompanyEdit" name="addressCompanyEdit" required></textarea>
                    </div>
                </div>


                </div>
    </div>
    
    <div class="modal-footer">
    <button type="button"  name="btnUpdateCompany" id="btnUpdateCompany" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; UPDATE</button>
    </div>

    </div>
  </div>
</div>
