@extends('admin.layouts.app')
 
@section('content')
<!--begin::API keys-->
<div class="card pt-5 px-5">
    <!--begin::Toolbar wrapper-->
    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo49/dist/index.html"
                        class="text-muted text-hover-primary">Products</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">home</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="/products/create"
                class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Create products</a>
            </div>
            <!--end::Actions-->
    </div>
    <!--end::Toolbar wrapper-->
    <!--begin::Header-->
    <div class="card-header card-header-stretch">
        <!--begin::Title-->
        <div class="card-title">
            <h3>Products</h3>
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9" id="kt_api_keys_table">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr>
                        <th class="min-w-150px ps-9">S.no</th>
                        <th class="min-w-250px px-0">product_name</th>
                        <th class="min-w-250px px-0">sku</th>
                        <th class="min-w-250px px-0">description</th>
                        <th class="min-w-250px px-0">price</th>
                        <th class="min-w-250px px-0">category</th>
                        <th class="min-w-250px px-0">featured</th>
                        <th class="min-w-250px px-0">status</th>
                        <th class="w-100px">Action</th>
                        <th class="w-100px"></th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-semibold text-gray-600">
                    @foreach ($products as $product)
                    @php
                    $category = \App\Models\Category::find($product->category);
                    @endphp
                    <tr>
                        <td class="ps-9">{{$i ++}}</td>
                        <td class="ps-0">{{$product->product_name}}</td>
                        <td class="ps-0">{{$product->sku}}</td>
                        <td class="ps-0">{{$product->description}}</td>
                        <td class="ps-0">{{$product->price}}</td>
                        <td class="ps-0">{{$category->title}}</td>
                        <td class="ps-0">{{$product->featured}}</td>
                      
                        
                        <td>{{ $product->status == 1 ? "Active" :"Deactive" }}</td>
                        {{-- <span class="badge badge-light-success fs-7 fw-semibold">Active</span> : <span class="badge badge-light-danger fs-7 fw-semibold">Inactive</span> --}}
                            
                        
                       
                        <td class="pe-9">
                            <div class="w-200px position-relative">
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                            <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}"> Edit</a>
                                            <button class="btn btn-danger" type="submit">Delete</button>                                           
                                            @csrf
                                            @method('DELETE')
                                    </form>
                                </select>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                <!--end::Tbody-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Body-->
</div>
<!--end::API keys-->    
@endsection