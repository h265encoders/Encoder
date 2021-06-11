<style>
    .wc-theme-item {
        font-size: 15px;
        padding-top: 6px;
        padding-bottom: 6px;
        cursor: pointer;
        border-bottom: 1px solid #eeeeee;
    }
    /*.wc-theme-item:hover {*/
    /*    background: var(--btn_background);*/
    /*    color: white;*/
    /*}*/
    .wc-theme-item.active {
        background: var(--btn_background);
        color: white;
    }
    .wc-theme-row {
        height: 25px;
        line-height: 25px;
    }
    .wc-theme-key {
        height: 25px !important;
        font-size: 14px;
    }
    .wc-theme-mark {
        width: 10px;
        height: 25px;
        border-radius: 3px;
        border: 1px solid #dddddd;
        background: #fb0;
        margin-left: -5px;
    }
    .wc-theme-addTheme{
        font-size: 14px;
        width: 36px;
        height: 36px;
        border-radius: 18px;
        margin-top: 15px
    }
</style>
<div class="modal fade bs-modal-lg" id="myManager" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span style="font-size: 16px">
                    <cn>主题管理器</cn>
                    <en>Theme Manager</en>
                </span>
            </div>
            <div class="modal-body">
                <div id="themeAlert"></div>
                <div class="row">
                    <div id="themeBox" class="col-md-2 col-sm-2 text-center"></div>
<!--   第1列        -->
                    <div class="col-md-3 col-sm-3" style="border-left: 1px solid #cccccc;overflow: auto">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>Html/Body</cn>
                                            <en>Html/Body</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group wc-theme-row">
                                            <label class="col-md-5 col-sm-5 control-label">
                                                <cn>背景色</cn>
                                                <en>Background</en>
                                            </label>
                                            <div class="col-md-7 col-sm-7">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <input id="--body_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 text-center">
                                                        <div class="wc-theme-mark"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>导航栏</cn>
                                            <en>Navigation Bar</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>导航栏背景色</cn>
                                                        <en>Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navbar_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>图标背景色</cn>
                                                        <en>Icon Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navbar_item_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>图标颜色</cn>
                                                        <en>Icon Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navbar_item_color" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>选中图标背景色</cn>
                                                        <en>Select Icon Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navbar_item_active_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>选中图标颜色</cn>
                                                        <en>Select Icon Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navbar_item_active" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>导航栏下拉菜单</cn>
                                            <en>Navigation Bar Drop-down Menu</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>菜单背景色</cn>
                                                        <en>Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--dropdown_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>字体颜色</cn>
                                                        <en>Font Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--dropdown_color" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>悬停背景色</cn>
                                                        <en>Hover Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--dropdown_item_active_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>悬停字体颜色</cn>
                                                        <en>Hover Font Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--dropdown_item_active" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<!--   第2列        -->
                    <div class="col-md-4 col-sm-4" style="border-left: 1px solid #cccccc;overflow: auto">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>页脚</cn>
                                            <en>Footer</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group wc-theme-row">
                                            <label class="col-md-5 col-sm-5 control-label">
                                                <cn>背景色</cn>
                                                <en>Background</en>
                                            </label>
                                            <div class="col-md-7 col-sm-7">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <input id="--foot_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 text-center">
                                                        <div class="wc-theme-mark"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group wc-theme-row">
                                            <label class="col-md-5 col-sm-5 control-label">
                                                <cn>字体颜色</cn>
                                                <en>Font Color</en>
                                            </label>
                                            <div class="col-md-7 col-sm-7">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <input id="--foot_color" class="colorPicker form-control wc-theme-key" type="text"/>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 text-center">
                                                        <div class="wc-theme-mark"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>Tab标签</cn>
                                            <en>Tab Label</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>标签栏背景色</cn>
                                                        <en>Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navtab_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>Item背景色</cn>
                                                        <en>Item Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navtab_item_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>Item字体颜色</cn>
                                                        <en>Item Font Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navtab_item_color" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>Item选中背景色</cn>
                                                        <en>Item Select Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navtab_item_active_border" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>Item选中字体颜色</cn>
                                                        <en>Item Select Font Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--navtab_item_active" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>Slider滑动条</cn>
                                            <en>Slider Bar</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>滑块颜色</cn>
                                                        <en>Slider Handle Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--slider_touch" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>滑动条颜色</cn>
                                                        <en>Slider Selection Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--slider_selection" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<!--   第3列        -->
                    <div class="col-md-3 col-sm-3" style="border-left: 1px solid #cccccc;overflow: auto">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>Button按钮</cn>
                                            <en>Button</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>按钮背景颜色</cn>
                                                        <en>Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--btn_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>按钮字体颜色</cn>
                                                        <en>Font Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--btn_color" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>悬停背景色</cn>
                                                        <en>Hover Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--btn_hover_background" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>悬停字体颜色</cn>
                                                        <en>Hover Font Color</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--btn_hover_color" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>Checkbox复选框</cn>
                                            <en>Checkbox</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>勾选背景颜色</cn>
                                                        <en>Active Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--checkbox_active" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>Switch开关</cn>
                                            <en>Switch</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>打开背景色</cn>
                                                        <en>Active Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--switch_active" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default" style="border: none;margin: 0px">
                                    <div class="title">
                                        <h3 class="panel-title">
                                            <cn>CPU、内存、温度、网络</cn>
                                            <en>CPU/Memory/Temperature/Netword</en>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group wc-theme-row">
                                                    <label class="col-md-5 col-sm-5 control-label">
                                                        <cn>模块颜色</cn>
                                                        <en>Active Background</en>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8">
                                                                <input id="--system_state_active" class="colorPicker form-control wc-theme-key" type="text"/>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-center">
                                                                <div class="wc-theme-mark"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
<!--                <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#myModal">新建</button>-->
                <button type="button" class="btn btn-warning" id="delete" onclick="onDelTheme()">删除</button>
                <button type="button" class="btn btn-warning" id="save" onclick="onSaveTheme()">保存</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" style="z-index: 10000">
    <div class="modal-dialog" role="document" style="width: 20%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新建主题</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="newThemeName" class="form-control" property="请输入主题名">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-warning" onclick="onNewThemeOK()">确定</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delModal" tabindex="1" style="z-index: 10000;">
    <div class="modal-dialog" role="document" style="width: 20%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <cn>提示</cn>
                    <en>Info</en>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7" style="line-height: 34px;font-size: 14px">
                        <span>
                            <cn>确认删除主题</cn>
                            <en>Confirm deletion the theme of</en>
                            <span id="delThemeName"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <cn>取消</cn>
                    <en>Cancel</en>
                </button>
                <button type="button" class="btn btn-warning" onclick="onDelThemeBtn()">
                    <cn>确定</cn>
                    <en>OK</en>
                </button>
            </div>
        </div>
    </div>
</div>

<script id="theme_tpl" type="text/x-handlebars-template">
    {{#each this}}
    <div id="{{this}}_" class="row wc-theme-item" onclick='onThemeClick("{{this}}")'>
        <div class="col-md-12 col-sm-12">
            {{this}}
        </div>
    </div>
    {{/each}}
    <div class="text-center">
        <button class="btn wc-theme-addTheme btn-warning" onclick="onAddTheme()">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</script>

<script src="vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
    var themeObj = null;

    // Modal垂直居中
    $("#myModal,#myManager,#delModal").on('show.bs.modal', function(){
        var $this = $(this);
        var $modal_dialog = $this.find('.modal-dialog');
        // 关键代码，如没将modal设置为 block，则$modala_dialog.height() 为零
        $this.css('display', 'block');
        $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
        if($this.attr("id") == "myManager"){
            $("body").css("overflow","hidden");
        }
    });

    $("#myManager").on('hide.bs.modal', function(){
        $("body").css("overflow","auto");
    });

    function onSetKeyColor(key,data) {
        data = data.substring(data.indexOf(key), data.length);
        var index1 = data.indexOf(":");
        var index2 = data.indexOf(";");
        var color = data.substring(index1 + 1, index2);

        //$("#"+key).val(color);
        $("#"+key).parent().next().children().css("background-color",color);
        $("#"+key).colorpicker({format: "hex", color: color});
        $("#"+key).colorpicker('setValue',color);
        $("#"+key).colorpicker().on('changeColor', function () {
            $(this).parent().next().children().css("background-color",$(this).val());
        });
    }

    function onThemeClick(themeName) {

        if(themeName === "default"){
            $("#delete").css("visibility","hidden");
            $("#save").css("visibility","hidden");
        } else {
            $("#delete").css("visibility","visible");
            $("#save").css("visibility","visible");
        }

        $("#"+themeName+"_").siblings().removeClass("active");
        $("#"+themeName+"_").addClass("active");
        $.ajax({
            url: "/css/theme/" + themeName + ".css", success: function (data) {
                onSetKeyColor("--body_background",data);
                onSetKeyColor("--foot_background",data);
                onSetKeyColor("--foot_color",data);

                onSetKeyColor("--navbar_background",data);
                onSetKeyColor("--navbar_item_color",data);
                onSetKeyColor("--navbar_item_background",data);
                onSetKeyColor("--navbar_item_active",data);
                onSetKeyColor("--navbar_item_active_background",data);

                onSetKeyColor("--navtab_background",data);
                onSetKeyColor("--navtab_item_color",data);
                onSetKeyColor("--navtab_item_background",data);
                onSetKeyColor("--navtab_item_active",data);
                onSetKeyColor("--navtab_item_active_border",data);

                onSetKeyColor("--dropdown_background",data);
                onSetKeyColor("--dropdown_color",data);
                onSetKeyColor("--dropdown_item_active_background",data);
                onSetKeyColor("--dropdown_item_active",data);

                onSetKeyColor("--title_panel_background",data);
                onSetKeyColor("--title_panel_color",data);

                onSetKeyColor("--slider_touch",data);
                onSetKeyColor("--slider_selection",data);

                onSetKeyColor("--switch_active",data);

                onSetKeyColor("--btn_color",data);
                onSetKeyColor("--btn_background",data);
                onSetKeyColor("--btn_hover_color",data);
                onSetKeyColor("--btn_hover_background",data);

                onSetKeyColor("--checkbox_active",data);
                onSetKeyColor("--input_active",data);
                onSetKeyColor("--system_state_active",data);
            }
        })
    }

    function onDelTheme() {
        var id = $(".wc-theme-item.active").attr("id");
        var themeName = id.replace("_","");
        $("#delThemeName").text(themeName+"?");
        $("#delModal").modal("show");
        $(".modal-backdrop").each(function (index,obj) {
            if(index === 1)
                $(obj).css("z-index","9999")
        })
    }

    function onDelThemeBtn() {
        var id = $(".wc-theme-item.active").attr("id");
        var themeName = id.replace("_","");
        var obj = {"name":themeName};
        func("delTheme",obj,function (res) {
            if (res["result"] === "OK") {
                var themes = themeObj["themes"];
                var array = [];
                for(var i=0;i<themes.length;i++){
                    if(themeName !== themes[i])
                        array.push(themes[i]);
                }
                themeObj["themes"] = array;
                func("saveConfigFile",{path: "config/theme.json",data: JSON.stringify(themeObj,null,2)},function (res) {
                    if(res["result"] === "OK"){
                        var theme_tpl   =  $("#theme_tpl").html();
                        var template = Handlebars.compile(theme_tpl);
                        var html = template(array);
                        $("#themeBox").html(html);
                        $("#delModal").modal("hide");
                    }
                })
            }
        });
    }

    function onSaveTheme() {
        var id = $(".wc-theme-item.active").attr("id");
        var themeName = id.replace("_","");

        var obj = {
            "--body_background" : $("#--body_background").val(),
            "--foot_background" : $("#--foot_background").val(),
            "--foot_color" : $("#--foot_color").val(),

            "--navbar_background" : $("#--navbar_background").val(),
            "--navbar_item_color" : $("#--navbar_item_color").val(),
            "--navbar_item_background" : $("#--navbar_item_background").val(),
            "--navbar_item_active" : $("#--navbar_item_active").val(),
            "--navbar_item_active_background" : $("#--navbar_item_active_background").val(),

            "--navtab_background" : $("#--navtab_background").val(),
            "--navtab_item_color": $("#--navtab_item_color").val(),
            "--navtab_item_background" : $("#--navtab_item_background").val(),
            "--navtab_item_active": $("#--navtab_item_active").val(),
            "--navtab_item_active_border": $("#--navtab_item_active_border").val(),

            "--dropdown_background": $("#--dropdown_background").val(),
            "--dropdown_color": $("#--dropdown_color").val(),
            "--dropdown_item_active_background": $("#--dropdown_item_active_background").val(),
            "--dropdown_item_active": $("#--dropdown_item_active").val(),

            "--slider_touch": $("#--slider_touch").val(),
            "--slider_selection": $("#--slider_selection").val(),

            "--switch_active": $("#--switch_active").val(),

            "--btn_color": $("#--btn_color").val(),
            "--btn_background": $("#--btn_background").val(),
            "--btn_hover_color": $("#--btn_hover_color").val(),
            "--btn_hover_background": $("#--btn_hover_background").val(),

            "--checkbox_active": $("#--checkbox_active").val(),
            "--system_state_active": $("#--system_state_active").val(),
            "--placeholder":"#fb0"
        }

        var css = JSON.stringify(obj,null,2);
        css = "html "+ css;
        css = css.replace(/\"/g,"");
        css = css.replace(/,/g,";");
        css = css.replace(/ /g,"");

        func("saveTheme",{"css": css,"name":themeName},function (res) {
            if(res["result"] === "OK")
                htmlAlert("#themeAlert", "success", "<cn>保存成功！</cn><en>Save success!</en>", "", 3000);
        })
    }

    function onAddTheme() {
        var themes = themeObj["themes"];
        if(themes.length >= 15) {
            htmlAlert("#themeAlert", "danger", "<cn>新建主题失败，最多保存15个主题!</cn><en>New theme failed, save up to 15 themes!</en>", "", 3000);
            return;
        }
        $("#myModal").modal("show");
        $(".modal-backdrop").each(function (index,obj) {
            if(index === 1)
                $(obj).css("z-index","9999")
        })
    }
    function onNewThemeOK() {
        var name = $("#newThemeName").val();
        if(name === "" || name === null || name === undefined)
            return;

        var themes = themeObj["themes"];
        for(var i=0;i<themes.length;i++) {
            var themeName = themes[i];
            themeName = themeName.replace(/\s+/g,"");
            if(themeName == name) {
                htmlAlert("#themeAlert", "danger", "<cn>主题名重复!</cn><en>The name of theme is duplication!</en>", "", 3000);
                return;
            }
        }

        var obj = {"name":name};
        func("addNewTheme",obj,function (res) {
            if(res["result"] === "OK") {
                var themes = themeObj["themes"];
                themes.push(name);
                themeObj["themes"] = themes;
                func("saveConfigFile",{path: "config/theme.json",data: JSON.stringify(themeObj,null,2)},function (res) {
                    if(res["result"] === "OK") {
                        $('#myModal').modal('hide');
                        var theme_tpl   =  $("#theme_tpl").html();
                        var template = Handlebars.compile(theme_tpl);
                        var html = template(themes);
                        $("#themeBox").html(html);
                    }
                })
            }
        })
    }

    $( "#setTheme" ).click( function () {
        themeObj["used"] = $("#theme").val();
        func("saveConfigFile",{path: "config/theme.json",data: JSON.stringify(themeObj,null,2)},function (res) {
            if(res["result"] === "OK"){
                localStorage.removeItem("themeName");
                location.reload();
            }
        })
    });

    $(function () {
        $.ajax({url:"config/theme.json",success:function(data){
                themeObj = data;
                var used = data["used"];
                var themes = data["themes"];
                for(var i=0;i<themes.length;i++){
                    var opt = new Option(themes[i],themes[i]);
                    if(themes[i] === used)
                        opt.selected = true;
                    $("#theme")[0].add(opt);
                }

                var theme_tpl   =  $("#theme_tpl").html();
                var template = Handlebars.compile(theme_tpl);
                var html = template(themes);
                $("#themeBox").html(html);
        }});

        setTimeout(function () {
            onThemeClick("default");
        },1000)
    });
</script>
