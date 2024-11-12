<div class="row d-flex align-items-end pb-1 pt-2">
    <div class="col-md-12">
        <h6 class="invoice-to-title">{{$field->additionalField->ar_name}}</h6>
        <select   id="{{$field->additionalField->id}}" class="form-control" name="{{$field->additionalField->id}}" @if($field->additionalField->extra==2) readonly @endif required>
            <option value="{{$field->ar_value}}">{{$field->ar_value}}</option>
            @foreach(explode(',',$field->additionalField->ar_value) as $item)
                <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select>
        <span class="error" id="error{{$field->id}}"></span>
        @if($field->additionalField->related_id!=null)
            @push('script')
                <script>
                    $(document).ready(function () {
                        @if($field->additionalField->related_operation!=6)
                        $('#{{$field->additionalField->related_id}}').on('change',function () {
                            @if($field->additionalField->related_operation==5)
                            var val{{$field->additionalField->id}}=parseFloat(this.value).toFixed(1)*{{$field->additionalField->related_operation/100}}+parseInt($('#{{$field->additionalField->related_id}}').val());

                            @else
                            var val{{$field->additionalField->id}}=parseFloat(this.value){{\App\Models\AdditionalField::$operations[$field->related_operation]}}parseFloat({{$field->additionalField->related_value}});
                            console.log(val{{$field->id}});
                            @endif
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
