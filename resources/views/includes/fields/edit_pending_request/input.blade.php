<div class="row d-flex align-items-end pb-1 pt-2">
    <div class="col-md-12">
        <h6 class="invoice-to-title">{{$field->additionalField->ar_name}}</h6>

        <input  id="{{$field->additionalField->id}}"
                @if($field->additionalField->type==2||$field->additionalField->type==6) type="text"
                @else type="{{\App\Models\AdditionalField::$type[$field->additionalField->type]}}" @endif
                class="form-control" name="{{$field->additionalField->id}}"
                @if($field->additionalField->type==6||$field->additionalField->type==2) step="0.01" @endif
                @if($field->additionalField->extra==2) readonly @endif
                maxlength="{{$field->additionalField->max}}"  required dir="rtl" value="{{$field->ar_value}}"/>
        <span class="error" id="error{{$field->additionalField->id}}"></span>
        @push('script')
            @if($field->type==2)
                <script>
                    $("#{{$field->additionalField->id}}").keyup(function() {
                        $("#{{$field->additionalField->id}}").val(this.value.match(/[0-9]*/));
                    });
                </script>
            @endif

        @endpush
        @if($field->related_id!=null)
            @push('script')
                <script>
                    $(document).ready(function () {
                        @if($field->additionalField->related_operation!=6)
                        $('#{{$field->additionalField->related_id}}').on('change',function () {
                            @if($field->additionalField->related_operation==5)
                            var val{{$field->additionalField->id}}=parseFloat(this.value).toFixed(1)*{{$field->additionalField->related_value/100}}+parseInt($('#{{$field->additionalField->related_id}}').val());

                            @else
                            var val{{$field->additionalField->id}}=parseFloat(this.value){{\App\Models\AdditionalField::$operations[$field->additionalField->related_operation]}}parseFloat({{$field->additionalField->related_value}});
                            console.log(val{{$field->additionalField->id}});
                            @endif->additionalField
                            $('#{{$field->additionalField->id}}').val(val{{$field->additionalField->id}});
                            $('#{{$field->additionalField->id}}').change();
                        });
                        @else
                        $('#{{$field->additionalField->id}}').on('change',function () {
                            console.log('id');
                            if(this.value!=$('#{{$field->additionalField->related_id}}').val()) {
                                console.log(this.value);
                                validate=false;
                                $('#error{{$field->additionalField->id}}').html("الحقل غير مطابق")

                            }else {
                                validate=true;
                                $('#error{{$field->additionalField->id}}').html("")
                            }
                        });
                        @endif
                    });
                </script>
            @endpush
        @endif
    </div>
</div>
