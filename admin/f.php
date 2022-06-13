<form method="post">
   <div class="form-group row">
                      <label for="examplename" class="col-sm-2 col-form-label-sm">Security Deposit<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                         <input type="hidden" name="no7" id="no7" value="<?php echo $id;?>">
                        <input type="number" id="deposit" class="form-control"name="security_deposit" placeholder="Deposit" required>
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="exampleage" class="col-sm-2 col-form-label-sm">Monthly Rent<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="number" id="rent" class="form-control"name="rent_amount" placeholder="Rent" required>
                      </div>
                    </div>     
                     <div class="form-group row">
                      <label for="exampleage" class="col-sm-2 col-form-label-sm">Payment Method<label style="color:Red">*</label></label>
                        <div class="col-sm-4">
                          <select class="form-control select2 select2-hidden-accessible" name="method" id="checkselec" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="4">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                        </select>
                        </div>
                      </div>
                       <div class="form-group row">
                      <label for="exampleage" class="col-sm-2 col-form-label-sm">Bank<label style="color:Red">*</label></label>
                        <div class="col-sm-4">
                          <select class="form-control select2 select2-hidden-accessible"  name="bank" id="bank" style="width: 100%;" data-select2-id="1" tabindex="-2" aria-hidden="true">
                                <option selected="selected" data-select2-id="2">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                        </select>
                        </div>
                      </div>
    
                    			  <div class="form-group row">
                      <label for="exampldate" class="col-sm-2 col-form-label">Date Of Payment<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="date" id="date" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputtran" class="col-sm-2 col-form-label">Transaction ID<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="tid"  id="tid" placeholder="Enter Transaction ID" required>
                      </div>
                    </div>
                    <div class="">
                  <input type="hidden" name="agreement_details" value="">
                  <a  class="btn btn-primary previous " style="color: aliceblue"  id=""> Previous<i class="mdi mdi-chevron-left"></i></a>
                <a href="case">  <button type="button" name="submitpayment" id="submitpayment" class="btn btn-info" data-tt="tooltip" title=""  data-original-title="Click here to Save" onclick="function()" >submit</button>&nbsp;</a>
                </div>
				

                    </form>