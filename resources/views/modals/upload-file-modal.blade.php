  <div id="upload-file-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-full-width">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Upload Files</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('projectmanage.projectfiles.store') }}" method="POST" id="submit-form"
                  enctype="multipart/form-data">
                  @csrf
                  {{-- hidden values set when clicking "Manage File" --}}
                  <input type="hidden" name="project_id" id="modal_project_id">
                  <input type="hidden" name="project_category_id" id="modal_category_id">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-6 col-md-12">
                              <div class="mb-3">
                                  <input type="file" class="form-control" name="files" id="upload_files_id">
                              </div>
                          </div>

                          <div class="col-lg-6 col-md-12">

                              <div class="mb-3">
                                  <input type="text" class="form-control" name="remark" placeholder="Remark">

                              </div>
                          </div>

                      </div>

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save</button>
                  </div>
              </form>

              <div class="content" style="padding-top: 0 !important;">

                  <div class="card border-0 rounded-0">

                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-bordered table-responsive table-hover text-nowrap">

                                  <thead>
                                      <tr>
                                          <th class="text-center" style="background-color: #9dd2e7">#</th>
                                          <th class="text-center" style="background-color: #9dd2e7">File Name</th>
                                          <th class="text-center" style="background-color: #9dd2e7">Download</th>
                                          <th class="text-center" style="background-color: #9dd2e7">Upload Date</th>
                                          <th class="text-center" style="background-color: #9dd2e7">Remark</th>
                                          <th class="text-center" style="background-color: #9dd2e7">Upload By</th>
                                          <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                                      </tr>
                                  </thead>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div> <!-- end modal content -->
      </div> <!-- end modal dialog -->
  </div>
