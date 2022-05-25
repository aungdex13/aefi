<td>
                          <select type="text" id="name_of_vaccine" name="name_of_vaccine[]" class="form-control" required>
                            <option value="">กรุณาระบุชื่อวัคซีน</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume" name="vaccine_volume[]" class="form-control">
                            <option value="">กรุณาระบุปริมาณที่ให้</option>
                            <?php
                                 foreach ($arr_vaccine_volume as $k=>$v) {
                                 ?>
                            <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="route_of_vaccination1" name="route_of_vaccination[]" class="form-control">
                            <option value="">กรุณาระบุวิธีที่ให้</option>
                            <?php
                                   foreach ($arr_route_of_vaccination as $k=>$v) {
                               ?>
                            <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccination_site1" name="vaccination_site[]" class="form-control">
                            <option value="">กรุณาระบุวิธีตำแหน่ง</option>
                            <?php
                                   foreach ($arr_vaccination_site as $k=>$v) {
                               ?>
                            <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select name="dose[]" id="dose1" class="form-control">
                            <option value="1">เข็มที่ 1</option>
                            <option value="2">เข็มที่ 2</option>
                            <option value="3">เข็มที่ 3</option>
                          <option value="4">เข็มที่ 4</option>
                            <option value="5">เข็มที่ 5</option>
                          <option value="6">เข็มที่ 6</option>                          
                          </select>
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination[]" id="date_of_vaccination1" class="form-control  datepicker readonly" data-date-format="yyyy-mm-dd" required>
                        </td>
                        <td>
                          <input type="time" id="time_of_vaccination1" name="time_of_vaccination[]" class="form-control" required>
                        </td>
                        <td>
                          <input type="radio" id="symptom1_1" name="symptom_status[0]" value="1" data-toggle="modal" data-target="#Symptom1">
                          <label for="age1"> : มีอาการ</label><br>
                          <input type="radio" id="symptom1_2" name="symptom_status[0]" value="0"  data-toggle="modal" data-target="#nonSymptom1">
                          <label for="age2"> : ไม่มีอาการ</label><br>
                        </td>
                        <td>
                          <select type="text" id="manufacturer1" name="manufacturer[]" class="form-control">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            <?php
                                   foreach ($arr_manufacturer as $k=>$v) {
                               ?>
                            <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="other_manufacturer" name="other_manufacturer[]" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="lot_number1" name="lot_number[]" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date1" name="expiry_date[]" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                        </td>
                        {{-- <td>
                          <input type="text" id="name_of_diluent1" name="name_of_diluent[]" class="form-control">
                        </td> --}}
                        <td>
                         {{-- <input type="text"  id="rash1" name="rash[]" value="0027"> --}}
                          <input type="text" id="lot_number_diluent1" name="lot_number_diluent[]" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent[]" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                        </td>
                        {{-- <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution[]" class="form-control" data-date-format="yyyy-mm-dd"></td> --}}
                        {{-- <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]" class="form-control"></td> --}}
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                        <td>
                          <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>
                        </td>