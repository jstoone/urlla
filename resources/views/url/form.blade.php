<!-- URL destination -->
<div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Url destination</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="destination" value="{{ $url->base() or old('destination') }}">

        @if ($errors->has('destination'))
            <span class="help-block">
                <strong>{{ $errors->first('destination') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Google Analytics helper -->
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="utm" 
                    {{ old('utm') ? ' checked ' : '' }}
                    data-toggle="collapse" data-target="#url-utm">
                Add Google Analytics UTM
            </label>
        </div>
    </div>
</div>

<div id="url-utm" class="{{ !old('utm') ? 'collapse' : '' }}">
    <!-- Google Analytics: UTM Source -->
    <div class="form-group{{ $errors->has('utm_source') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">UTM Source</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="utm_source" value="{{ old('utm_source') }}">

            @if ($errors->has('utm_source'))
                <span class="help-block">
                    <strong>{{ $errors->first('utm_source') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Google Analytics: UTM Medium -->
    <div class="form-group{{ $errors->has('utm_medium') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">UTM Medium</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="utm_medium" value="{{ old('utm_medium') }}">

            @if ($errors->has('utm_medium'))
                <span class="help-block">
                    <strong>{{ $errors->first('utm_medium') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Google Analytics: UTM Campaign -->
    <div class="form-group{{ $errors->has('utm_campaign') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">UTM Campaign</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="utm_campaign" value="{{ old('utm_campaign') }}">

            @if ($errors->has('utm_campaign'))
                <span class="help-block">
                    <strong>{{ $errors->first('utm_campaign') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>


<!-- Submit button -->
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-sign-in"></i>Create
        </button>
    </div>
</div>
