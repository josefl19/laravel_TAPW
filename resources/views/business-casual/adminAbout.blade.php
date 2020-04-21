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
      <i class="new_member btn btn-primary fas fa-plus"> New member</i>
      <br><br>
      <table id="team_table" class="table table-bordered table-condensed table-hover display" style="width:100%">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">puesto</th>
              <th scope="col">image</th>
              <th scope="col">view</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
            </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">puesto</th>
            <th scope="col">image</th>
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
<div id="viewMember" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p id="nameMember"></p>
        <p id="imgMember"><img id="imageMember" width="50%" height="50%" /></p>
        <p id="jobMember"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="formTeam" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" id="teamEditAdd"></h4>
    </div>
    <div class="modal-body">
      <span id="form_result"></span>
      <form method="post" id="sample_formTeam" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="control-label col-md-3" >Name: </label>
          <div class="col-md-9">
            <input type="text" name="nameT" id="nameT" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Puesto: </label>
          <div class="col-sm-9">
            <select custom-select" id="jobTeam">
              <option selected>Seleccionar...</option>
              <option value="CEO-Presidente">CEO-Presidente</option>
              <option value="Vicepresidente">Vicepresidente</option>
              <option value="Secreatry">Secreatry</option>
              <option value="Admin">Admin</option>
              <option value="RRHH">RRHH</option>
              <option value="Sales Manager">Sales Manager</option>
            </select>
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Image: </label>
            <div class="col-sm-9">
              <select custom-select" id="imageTeam">
                <option selected>Seleccionar...</option>
                <option value="team1.jpg">team1.jpg</option>
                <option value="team2.jpg">team2.jpg</option>
                <option value="team3.jpg">team3.jpg</option>
                <option value="team4.jpg">team4.jpg</option>
                <option value="team5.jpg">team5.jpg</option>
                <option value="team6.jpg">team6.jpg</option>
              </select>
            </div>
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
</div>

 <div id="confirmDelMember" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Confirmation</h2>
          </div>
          <div class="modal-body">
              <h4 align="center" style="margin:0;">Delete team member?</h4>
          </div>
          <div class="modal-footer">
           <button type="button" name="del_member" id="del_member" class="btn btn-danger">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
</div>

@endsection