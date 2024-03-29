@php
use Carbon\Carbon;
@endphp
<table class="table table-hover text-center show-table">
    <thead class="tbh">
        <tr>
            <th scope="col" class="color border-0">#</th>
            <th scope="col" class="color border-0">NAME</th>
            <th scope="col" class="color border-0">EMAIL</th>
            <th scope="col" class="color border-0">TEXT</th>
            <th scope="col" class="color border-0">DATE</th>
            <th scope="col" class="color border-0">ACTIONS</th>
        </tr>
    </thead>
    <tbody class="tb">
        @foreach ($contactUses as $contactUs)
            <tr class="with-bottom-linear-gradient-to-left">
                <td class="border-top-0 text-color"> {{ ++$loop->index }} </td>
                <td class="border-top-0 text-color"> {{ $contactUs->name }} </td>
                <td class="border-top-0 text-color"> {{ $contactUs->email }} </td>
                <td class="border-top-0 text-color d-flex justify-content-center" title="{{ $contactUs->body }}">
                    <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1" data-toggle="modal"
                        data-target="#contactUs-{{ $contactUs->id }}" data-whatever="@mdo">TEXT</button>
                </td>
                <td class="border-top-0 text-color">{{ Carbon::parse($contactUs->created_at)->format('d/m/Y') }}</td>
                <td class="border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1" data-toggle="modal"
                            data-target="#delete-{{ $contactUs->id }}" data-whatever="@mdo">DELETE</button>
                    </div>
                </td>
            </tr>
            {{-- modal --}}
            <div class="modal fade" id="contactUs-{{ $contactUs->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content background-color-modals modal-border">
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="custom-font-size color">Text: </label>
                                    <h5 class="ml-3 mr-3 text-justify text-color"> {{ $contactUs->body }} </h5>
                                </div>
                                <div class="mt-3 d-flex justify-content-end mt-3">
                                    <button type="button" class="btn text-color pr-3 pl-3 mr-1 btn-sm custom-font-size"
                                        data-dismiss="modal">CANCLE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            {{-- modal --}}
            <div class="modal fade" id="delete-{{ $contactUs->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content background-color-modals modal-border">
                        <div class="modal-body">
                            <form action="{{ route('contactUs.destroy', ['contactUs' => $contactUs->id]) }}"
                                method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE THIS MESSAGE?
                                    </h5>
                                    <div class="mt-3 d-flex justify-content-end mt-3">
                                        <button type="button"
                                            class="btn text-color pr-3 pl-3 mr-1 btn-sm custom-font-size"
                                            data-dismiss="modal">CANCLE</button>
                                        <button type="submit"
                                            class="btns text-color pr-3 pl-3 btn-sm custom-font-size">YES DELETE THE
                                            MESSAGE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        @endforeach
    </tbody>
</table>
