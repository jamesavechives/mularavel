@extends('agency.themes.'.$theme.'.app')
@section('pageTitle', $title)

@section('content')
<div class="form-wrapper form-inline">
    <div id="scan_content">
        
    </div>
        <div class="form-input-group form-button align-center">
            <input type="submit" name="scan_device" class="form-save" id="scan_device" onclick="get_device_list({{$id}});" value="Scan" />
        </div>
</div>
<script type="text/javascript">
function get_device_list(agencyId){
    jQuery(document).ready(function () {
        var mac_list=[];
        jQuery.ajax({
            type: "GET",
            url:  "getmaclist",
            data: {'agency_id':agencyId},
            success: function (result) {
              
                mac_list=result.data;
                jQuery.ajax({
                    type: "POST",
                    url:  'http://localhost/pairing/scan.php',
                    data: {'mac_list': mac_list},
                    success: function (data) {
              
                    var result=generate_html(data);
              
                    jQuery("#scan_content").html(result);
                    },
                error: function (errorThrown) {
                alert(errorThrown);
                }
                });
            },
            error: function (errorThrown) {
                alert(errorThrown);
            }
        });
        
    });
    return false;
}

function generate_html(data1){
    
    var data = jQuery.parseJSON(data1);
    var html="<table>";
    for(i=0;i<data.length;i++){
            
            html+="<tr>";
            html+="<td>"+data[i]['name']+"<input type='hidden' id='device_name_"+i+"' value='"+data[i]['name']+"'/></td>";
            html+="<td>"+data[i]['ip']+"<input type='hidden' id='ip_"+i+"' value='"+data[i]['ip']+"'/></td>";
            html+="<td>"+data[i]['ssid']+"<input type='hidden' id='ssid_"+i+"' value='"+data[i]['ssid']+"'/></td>";
            html+="<td>"+data[i]['mac_address']+"<input type='hidden' id='mac_address_"+i+"' value='"+data[i]['mac_address']+"'/></td>";
            html+="<td>"+data[i]['device_type']+"<input type='hidden' id='device_type_"+i+"' value='"+data[i]['device_type']+"'/></td>";
            html+="<td>"+data[i]['time_zone']+"<input type='hidden' id='time_zone_"+i+"' value='"+data[i]['time_zone']+"'/></td>";
        if(data[i]['is_pair']==0){
            html+="<td><a href='#' onclick='pair_device("+i+")'>Pair</a></td>";
        }else{
            html+="<td><a href='#' onclick='unpair_device("+i+")'>UnPair</a></td>";
        }
    }
    
    return html;
}


function pair_device(i) {
    
    var ip = jQuery("#ip_"+i).val();
    var device_name= jQuery("#device_name_"+i).val();
    var ssid = jQuery("#ssid_"+i).val();
    var mac_address = jQuery("#mac_address_"+i).val();
    var device_type = jQuery("#device_type_"+i).val();
    var time_zone = jQuery("#time_zone_"+i).val();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/pairing/pair.php',
        dataType: 'json',
        data: {"target": 'new_pair','mac_address':mac_address,'ip':ip,'ssid':ssid,'device_name':device_name,'device_type':device_type,'time_zone':time_zone},
        success: function (data) {
                get_device_list_on_localhost();
        },
        error: function (errorThrown) {
                alert(errorThrown);
        }
    });
}

function unpair_device(i) {
    
  var mac_address = jQuery("#mac_address_"+i).val();
  jQuery.ajax({
        type: "POST",
        url: 'http://localhost/pairing/pair.php',
        dataType: 'json',
        data: {"target": 'delete_pair','mac_address':mac_address},
        success: function (data) {
                get_device_list_on_localhost();
        },
        error: function (errorThrown) {
                alert(errorThrown);
        }
    });
}
</script>
@endsection
