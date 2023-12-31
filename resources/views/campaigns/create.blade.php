@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb me-sm-6 me-5">
            <li class="text-sm breadcrumb-item">
                <a class="opacity-3 text-dark" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="text-sm breadcrumb-item"><a class="opacity-5 text-dark" href="{{ route('campaign.index') }}">
                    Campaign's List
                </a></li>
            <li class="text-sm breadcrumb-item text-dark active" aria-current="page">
                Create Campaign
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="w-full mx-auto mb-5">
        <h2 class="text-3xl font-bold text-gray-700">Campaigns</h2>
    </div>
    <div class="w-full mx-auto card">
        <div class="flex justify-between px-4 my-4">
            <h6>
                Create a new Campaign
            </h6>
            <a href="{{ route('campaign.index') }}" class="px-3 btn bg-gradient-danger btn-sm">
                <i class="px-2 fa-solid fa-arrow-left fa-beat"></i> Back to Campaign's List
            </a>
        </div>
        <form action="{{ route('campaign.store') }}" method="POST">
            @csrf
            <div class="px-5 row">
                <div class="col-md-6">
                    <h5 class="text-lg">Campaign Basic Info</h5>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="required">Campaign Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Campaign name">
                        </div>
                        <div class="form-group">
                            <label for="publisher" class="required">Select publisher</label>
                            <select class="form-control" required name="publisher_id" id="publisher">
                                <option selected disabled value="">
                                    Select a publisher
                                </option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">
                                        {{ $publisher->name }} ( {{ $publisher->short_name }} )
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="text-lg">Campaign Details Info</h5>
                    <div class="form-group">
                        <label for="ratio" class="required">Ratio</label>
                        <input type="number" class="form-control" required id="campaign_create_ratio" name="ratio"
                            placeholder="Ratio" min="0" max="1" step="any">
                        <label for="ratio" class="text-danger" id="ratioErrorMsg"></label>
                    </div>
                    <div class="-mt-4 form-group">
                        <label for="status" class="required">Select status</label>
                        <select class="form-control" required name="status" id="status">
                            <option selected value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    
                </div>
                <h5 class="text-lg">Campaign's operator and service Info</h5>
                <div class="row copyCampaignOperatorAndService">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="operator" class="required">Select Operator</label>
                            <select class="form-control" required name="operatorIds[]" id="operator">
                                <option selected disabled value="">
                                    Select a operator
                                </option>
                                @foreach ($operators as $operator)
                                    <option value="{{ $operator->id }}">
                                        {{ $operator->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="service" class="required">Select service</label>
                            <select class="form-control" required name="serviceIds[]" id="service">
                                <option selected disabled value="">
                                    Select a service
                                </option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md:float-left text-center md:mt-[30px]">
                            <button type="button" class="btn bg-gradient-secondary campaignAddedNewInfo">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row insertAddedInfo"></div>
                <div class="float-right mx-auto">
                    <button type="submit" class="btn bg-gradient-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    console.log("clicked");
    $(function(){
        handleNewInsetInfo();
    });

    const handleNewInsetInfo = () => {
        $(document).on("click",".campaignAddedNewInfo",function(){
            var html = $(".copyCampaignOperatorAndService").html();
            $(".insertAddedInfo").append(html);
            $(".insertAddedInfo").find(".col-md-4 .campaignAddedNewInfo")
            .removeClass("campaignAddedNewInfo").addClass("campaignRemoveInfo")
            .html('<i class="fa-solid fa-minus"></i>').removeClass("bg-gradient-secondary").addClass("btn bg-gradient-primary");
            removeAddedInfo();
        });
        
    };
    const removeAddedInfo = () => {
        $(document).on("click",".campaignRemoveInfo",function(){
            const thisParent = $(this).closest(".col-md-4");
            $(thisParent).prev().prev().remove();
            $(thisParent).prev().remove();
            $(thisParent).remove();
        });
    };
</script>
@endpush
