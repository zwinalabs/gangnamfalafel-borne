
<div class="card card-profile">
    <div class="px-2">
      <div class="mt-3">
        <h6>{{ __('Comment') }}<span class="font-weight-light"></span></h6>
      </div>
      <div class="card-content border-top">
        <br />
        <div class="form-group{{ $errors->has('comment') ? ' has-danger' : '' }}">
            <textarea name="comment" id="comment" class="green-border form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" placeholder="{{ __( 'Your comment here' ) }} ..." onChange="setComments('comment');" data-role="keypad"
              data-keys="a,z,e,r,t,y,u,i,o,p,q,s,d,f,g,h,j,k,l,w,x,c,v,b,n,m,_" style="border-color: transparent;
              width: 100%;"></textarea>
            @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <div class="row col-12">
        <div class="col-6"><button id="btn-cancel-comment" type="button" class="btn btn-outline-primary action-btn close" data-dismiss="modal" aria-label="Close" onClick="setCommentToTxt();">{{ __('Cancel') }}</button></div>
        <div class="col-6 text-right"><button  id="btn-valid-comment" type="button" class="btn btn-outline-primary action-btn close" data-dismiss="modal" aria-label="Close" onClick="setCommentToTxt();">{{ __('Apply') }}</button></div>
      </div>
    </div>
</div>
