<div class="row d-flex align-items-end pb-1 pt-2">
    <div class="col-md-12">
        <h6 class="invoice-to-title">{{$field->ar_name}}</h6>
        <select   id="{{$field->id}}" class="form-control" name="{{$field->id}}" @if($field->extra==2) readonly @endif required>
        @foreach(explode(',',$field->ar_value) as $item)
            <option value="{{$item}}">{{$item}}</option>
            @endforeach
    </select>
        <span class="error" id="error{{$field->id}}"></span>
        @if($field->related_id!=null)
            @push('script')
            <script>
                $(document).ready(function () {
                    @if($field->related_operation!=6)
$('#{{$field->related_id}}').on('change',function () {
                                @if($field->related_operation==5)
                        var val{{$field->id}}=parseFloat(this.value).toFixed(1)*{{$field->related_value/100}}+parseInt($('#{{$field->related_id}}').val());

                                @else
                        var val{{$field->id}}=parseFloat(this.value){{\App\Models\AdditionalField::$operations[$field->related_operation]}}parseFloat({{$field->related_value}});
                        console.log(val{{$field->id}});
                        @endif
$('#{{$field->id}}').val(val{{$field->id}});
                        $('#{{$field->id}}').change();
                    });
                    @else
$('#{{$field->id}}').on('change',function () {
                        console.log('id');
                        if(this.value!=$('#{{$field->related_id}}').val()) {
                            console.log(this.value);
                            validate=false;
                            $('#error{{$field->id}}').html("الحقل غير مطابق")

                        }else {
                            validate=true;
                            $('#error{{$field->id}}').html("")
                        }
                    });
                    @endif
                });
            </script>
            @endpush
        @endif
</div>
</div>
