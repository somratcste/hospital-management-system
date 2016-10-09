<div class="form-group clear">
            <label class="col-sm-2 control-label">Marketing Officer</label>
            <div class="col-sm-7">
              <select id="make" name="make">
                <option value="">Select Marketig Officer</option>

                  <option value="3">Mr. Bahadur</option>

              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Village Doctor</label>
            <div class="col-sm-7">
                  <select id="model" name="model">
                <option value="">Select Village Doctor</option>
              </select>
            </div>
          </div>

  

<script>
jQuery(document).ready(function($){
    $('#make').change(function(){
      $.get("{{ url('api/dropdown')}}", 
        { option: $(this).val() }, 
        function(data) {
          var model = $('#model');
          model.empty();
 
          $.each(data, function(index, element) {
                  model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
              });
        });
    });
  });</script>
<script   src="http://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous"></script>