<!--  Modal GIVEN NAME -->
<div data-target-template="given-name-target"></div>
<script type="text/template" id="App-Views-Given-Name-Modal">
<div class="modal fade" id="item-given-name" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content modal-sm-h">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add a custom name for this order</h4>
            </div>
            <div class="modal-body">
                <div class="p10">
                    <form>
                        {{ Form::token() }}
                        <p>e.g. John business card.</p>
                        <div class="form-textarea">
                            <textarea class="form-control" name="cart_item_name">{{{ $cart['item_given_name']['cart_item_name'] or '' }}}</textarea>
                            <!-- button -->
                            <div class="pull-right mT20">
                                <a href="#" data-dismiss="modal">
                                    <div class="brown btn btn-xs p5">CLOSE</div>
                                </a>
                                <a href="#">
                                    <div class="darkbrown btn btn-xs p5 update">UPDATE <span class="icon-right-dir-1"></span></div>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</script>