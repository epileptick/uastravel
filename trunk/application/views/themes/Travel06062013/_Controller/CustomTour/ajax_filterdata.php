<?php
  if(!empty($tours)){
    foreach ($tours as $key => $value) {
      if(!empty($value['price'])){
?>

    <li class="sortable_item">
      <div class="list_package_tour">
            <div class="row">
              <div class="twelve columns">
                <div class="title_tour">
                  <h4>
                    <a href="#" data-reveal-id="myTourModal_<?php echo $value['tour']["tour_id"]; ?>"> <img class="img_tour" src="<?php echo $value["tour"]["first_image"]; ?>"> <?php echo $value['tour']["tout_name"]; ?></a>
                    <input  class="item_property"
                            type="hidden"
                            id="packagedata"
                            name="packagedata[]"
                            value="<?php echo $value['tour']["tour_id"]; ?>"
                            packagetype="tour"
                            packageid="<?php echo $value['tour']["tour_id"]; ?>"
                            title="<?php echo $value['tour']["tout_name"]; ?>"
                            adultprice="<?php echo $value['price']->pri_sale_adult_price; ?>"
                            childprice="<?php echo $value['price']->pri_sale_child_price; ?>"
                            discountadultprice="<?php echo $value['price']->pri_discount_adult_price; ?>"
                            discountchildprice="<?php echo $value['price']->pri_discount_child_price; ?>"
                            totalday="<?php echo $value['totalday']; ?>"
                    />
                  </h4>
                </div>
              </div>
            </div>
            <div class="border"></div>
            <div class="package_price_list">
              <div class="price_switch">ซ่อนราคา</div>
              <table class="table table-hover table-condensed price_table">
                <thead>
                  <th></th>
                  <th>รายการ</th>
                  <th>ราคาผู้ใหญ่</th>
                  <th>ราคาเด็ก</th>
                </thead>
                <tbody>
                  <?php
                  foreach ($value['price_list'] as $priceKey => $priceValue) {
                    $isChecked = "";
                    $style = "";
                    if($priceValue["show_firstpage"] == 1){
                      $isChecked = "checked";
                      $style = "style='background:#FFF7A0;'";
                    }
                    ?>
                    <tr  <?php echo $style;?>>
                      <td width="5%">
                        <input type="checkbox" class="price_list" name="price_selected[<?php echo $value['tour']["tour_id"]; ?>][]" value="<?php echo $priceValue['id'];?>" <?php echo $isChecked;?> data-price-id="<?php echo $priceValue['id'];?>" data-adult-price="<?php echo (($priceValue['discount_adult_price'] > 0)? $priceValue['discount_adult_price']:$priceValue['sale_adult_price']); ?>" data-child-price="<?php echo (($priceValue['discount_child_price'] > 0)? $priceValue['discount_child_price']:$priceValue['sale_child_price']); ?>" data-is-charter="<?php echo $priceValue['charter']; ?>">
                      </td>
                      <td>
                        <?php echo $priceValue['name'];?>
                      </td>
                      <td class="price_list_price">
                        <?php echo (($priceValue['discount_adult_price'] > 0)? $priceValue['discount_adult_price']:$priceValue['sale_adult_price']); ?>
                        <?php echo $this->lang->line("global_lang_money_sign"); ?>
                      </td>
                      <td class="price_list_price">
                        <?php echo (($priceValue['discount_child_price'] > 0)? $priceValue['discount_child_price']:$priceValue['sale_child_price']); ?>
                        <?php echo $this->lang->line("global_lang_money_sign"); ?>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                </tbody>
              </table>
            </div>
      </div>
      <a class="delete tooltip_ne" title="ลบ" packageid="<?php echo $value['tour']["tour_id"]; ?>"></a>
      <!--
        <a class="add tooltip_ne" title="เพิ่ม"></a>
      -->
    </li>

<?php
      }
    }
  }else{
    echo "No data";
  }
?>