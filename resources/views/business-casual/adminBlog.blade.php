@extends('business_casual')
@section('content')
<div class="row">
  <div class="box">
    @if(session()->get('success'))
      <div class="alert alert-success text-center">
          {{ session()->get('success') }}
      </div>
    @endif
    <div class="col-lg-12">
      <i class="new_post btn btn-primary fas fa-plus"> New</i>
      <br><br>
      <table id="blog_table" class="table table-bordered table-condensed table-hover display" style="width:100%">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">title</th>
              <th scope="col">description</th>
              <th scope="col">image</th>
              <th scope="col">date</th>
              <th scope="col">author</th>
              <th scope="col">view</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
            </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">image</th>
            <th scope="col">date</th>
            <th scope="col">author</th>
            <th scope="col">view</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
          </tr>
        </tfoot>
    </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p id="titleModal"></p>
        <p id="imgModal"><img id="imageModal" width="50%" height="50%" /></p>
        <p id="descriptionModal"></p>
        <p id="authorModal"></p>
        <p id="createdDateModal"></p>
        <p id="imgModalForm"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" id="titleEditAdd"></h4>
    </div>
    <div class="modal-body">
      <span id="form_result"></span>
      <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="control-label col-md-3" >Title: </label>
          <div class="col-md-9">
            <input type="text" name="titleEdit" id="titleEdit" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Description: </label>
          <div class="col-md-9">
            <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="4"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Author: </label>
          <div class="col-md-9">
            <input type="text" class="form-control" id="authorEdit" name="authorEdit">
          <span id="store_image"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Image: </label>
          <div class="col-sm-9">
            <select custom-select" id="imageEdit">
              <option selected>Seleccionar...</option>
              <option value="slide-1.jpg">slide-1.jpg</option>
              <option value="slide-2.jpg">slide-2.jpg</option>
              <option value="slide-3.jpg">slide-3.jpg</option>
            </select>
          </div>
        </div>
        <br />
      </div>
      <div class="form-group" align="center">
        <div class="modal-footer">
          <input type="hidden" name="action" id="action" />
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Save" />
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Confirmation</h2>
          </div>
          <div class="modal-body">
              <h4 align="center" style="margin:0;">Are you sure you want to remove this post?</h4>
          </div>
          <div class="modal-footer">
           <button type="button" name="del_button" id="del_button" class="btn btn-danger">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
</div>

@endsection