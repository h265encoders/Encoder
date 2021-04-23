<script id="tpl" type="text/x-handlebars-template">
    {{#each this}}
    <div class="touch" id={{modId}} style="width: {{width}};height: {{height}};left: {{left}};top: {{top}};background-color: {{color}}">
        <div>{{name}}</div>
        <div class="drag" id={{dragId}}></div>
        <div class="resize" id={{resizeId}}></div>
    </div>
    {{/each}}
</script>

<script id="modtpl" type="text/x-handlebars-template">
    {{#each this}}
    <div class="col-sm-3">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="{{this}}" onclick="onCheckBoxClick(this)">
                <span>{{this}}</span>
            </label>
        </div>
    </div>
    {{/each}}
</script>
<script src="./js/drag.js"></script>
<script>
    var array = [];
    var own = [];
    var property = {
        IP:{color:"#66cccc",width:"256px",height:"30px"},
        AUD:{color:"#ff6666",width:"128px",height:"30px"},
        BR:{color:"#3399cc",width:"128px",height:"30px"},
        DISK:{color:"#483d8b",width:"256px",height:"30px"},
        MEM:{color:"#a52a2a",width:"128px",height:"30px"},
        REC:{color:"#c71585",width:"128px",height:"30px"},
        CPU:{color:"#cc6633",width:"128px",height:"30px"},
        TEMP:{color:"#993366",width:"128px",height:"30px"},
        HSIGN:{color:"#99cc66",width:"256px",height:"30px"},
        SSIGN:{color:"#666699",width:"256px",height:"30px"},
        INPUT:{color:"#009966",width:"256px",height:"30px"},
        CHN:{color:"#669966",width:"256px",height:"90px"}
    }

    function onCheckBoxClick(obj) {
        var modName = $(obj).siblings().html();
        if(obj.checked){
            var pro = property[modName];
            var obj = {
                name: modName,
                width:pro["width"],
                height:pro["height"],
                left:"0px",
                top:"0px",
                color:pro["color"],
                modId: modName.toLowerCase()+"_",
                dragId:modName.toLowerCase()+"_dr",
                resizeId:modName.toLowerCase()+"_re"
            }
            array.push(obj);
        }else{
            var index = -1;
            for(var i=0;i<array.length;i++) {
                var obj = array[i];
                if(obj.name === modName)
                    index = i;
            }
            array.splice(index,1);
        }

        initDesign();
    }

    function initDesign() {
        var tpl   =  $("#tpl").html();
        var template = Handlebars.compile(tpl);
        var html = template(array);
        $("#box").html(html);

        for(var i=0;i<array.length;i++) {
            var obj = array[i];
            let container = $("#box")[0];
            let elem = $("#"+obj.modId)[0];
            let dragHandle = $("#"+obj.dragId)[0];
            let resizeHandle = $("#"+obj.resizeId)[0];
            new Draggable(container, elem, dragHandle, null, true, function (dragObj) {
                let id = $(elem).attr("id");
                for(var j=0;j<array.length;j++)
                {
                    if(array[j].modId == id){
                        array[j].left = dragObj.left;
                        array[j].top = dragObj.top;
                    }
                }
            }, function (resizeObj) {
                let id = $(elem).attr("id");
                for(var j=0;j<array.length;j++)
                {
                    if(array[j].modId == id){
                        array[j].width = resizeObj.width;
                        array[j].height = resizeObj.height;
                    }
                }
            });

            $( "#mods input[name='"+obj.name+"']" ).attr( "checked", true );
        }
    }

    function initMods(mods) {
        var tpl   =  $("#modtpl").html();
        var template = Handlebars.compile(tpl);
        var html = template(mods);
        $("#modBox").html(html);
    }

    $( "#setOLED" ).click( function () {
        rpc4( "oled.upDesignConfig", [ JSON.stringify( {"mods":array, "own":own}, null, 2 ) ], function ( res ) {
            if ( typeof ( res.error ) != "undefined" ) {
                htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
            } else {
                htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
            }
        } );
    } );

    $(function () {
        $.ajax({url:"config/oled/oledMods.json",success:function(data){
                initMods(data["mods"]);
                own = data["own"];
            }}).responseText;

        $.ajax({url:"config/oled/oled.json",success:function(data){
                array = data["mods"];
                initDesign();
            }}).responseText;
    });
</script>
