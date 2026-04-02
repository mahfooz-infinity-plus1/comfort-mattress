
<!--<link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/style.css') !!}">-->

<style>
    /* list product css */
.list-product{
    margin-top: 30px;
}
.list-product .list-items{
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}
.list-product .list-items:last-child{
    border-bottom: none;
    margin: 0px;
    padding: 0px;
}
.list-product .list-items .tred-pro{
    width: 25%;
    position: relative;
}
.list-product .list-items .tred-pro .Pro-lable span.p-text,
.list-product .list-items .tred-pro .Pro-lable span.p-discount{
    position: absolute;
    top: 5px;
    font-size: 13px;
    color: #fff;
    padding: 2px 10px 2px 15px;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 20% 50%);
}
.list-product .list-items .tred-pro .Pro-lable span.p-text{
    left: 5px;
    background-color: #d25200;
}
.list-product .list-items .tred-pro .Pro-lable span.p-discount{
    right: 5px;
    background-color: #e30514;
}
.list-product .list-items .caption .pro-icn{
    position: unset;
    margin-top: 14px;
}
.list-product .list-items .caption .pro-icn a.w-c-q-icn i{
    background-color: #d25200;
    color: #fff;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    line-height: 0px;
    font-size: 16px;
    border-radius: 100%;
    border: 2px solid #d25200;
    -webkit-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
}
.list-product .list-items .caption .pro-icn a.w-c-q-icn:hover i{
    background-color: transparent;
    color: #000;
    -webkit-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
}
.list-product .list-items .caption{
    width: calc(75% - 20px);
    margin-left: 20px;
    padding-top: 0px;
}
.list-product .list-items .caption h3{
    font-size: 14px;
    font-weight: 400;
}



/*.list-product .list-items .caption h3 a{*/
/*    display: block;*/
/*    white-space: nowrap;*/
/*    width: 100%;*/
/*    overflow: hidden;*/
/*    text-overflow: ellipsis;*/
/*    font-weight: 600;*/
/*}*/
/*.list-product .list-items .caption p.list-description{*/
/*    font-size: 13px;*/
/*    margin-top: 8px;*/
/*    line-height: 21px;*/
/*}*/
/*.list-product .list-items .caption .rating{*/
/*    display: flex;*/
/*    margin-top: 14px;*/
/*}*/
/*.list-product .list-items .caption .rating i{*/
/*    color: #ccc;*/
/*    font-size: 14px;*/
/*    margin-right: 5px;*/
/*}*/
/*.list-product .list-items .caption .rating i.b-star,*/
/*.list-product .list-items .caption .rating i.c-star,*/
/*.list-product .list-items .caption .rating i.d-star,*/
/*.list-product .list-items .caption .rating i.e-star{*/
/*    color: #d25200;*/
/*}*/
/*.list-product .list-items .caption .rating i:last-child{*/
/*    margin-right: 0px;*/
/*}*/
/*.list-product .list-items .caption .pro-price{*/
/*    margin-top: 15px;*/
/*}*/
/*.list-product .list-items .caption .pro-price span.new-price{*/
/*    font-size: 16px;*/
/*    font-weight: 600;*/
/*    margin-right: 5px;*/
/*    line-height: 1;*/
/*}*/





.list-product .list-items .caption .pro-price span.old-price{
    color: #999;
    font-size: 14px;
    line-height: 1;
}
/* additional image css */
.list-product .list-items .tred-pro .tr-pro-img a img.additional-image{
    position: absolute;
    top: 0px;
    right: 0px;
    left: 0px;
    opacity: 0;
    visibility: hidden;
}
.list-product .list-items .tred-pro:hover .tr-pro-img a img.additional-image{
    opacity: 1;
    visibility: visible;
}
.list-product .list-items .tred-pro .tr-pro-img a img.additional-image,
.list-product .list-items .tred-pro:hover .tr-pro-img a img.additional-image{
    -webkit-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
}
.list-product p.list-all-page{
    margin: 0 auto;
    text-align: center;
    padding-top: 30px;
    font-weight: 700;
}
.list-all-page span.page-title{
    color: #000;
    display: block;
    text-align: center;
    margin-top: 30px;
    font-weight: 600;
}
.list-all-page .page-number{
    text-align: center;
    margin-top: 20px;
}
.list-all-page .page-number a{
    position: relative;
    margin-right: 5px;
}
.list-all-page .page-number a:after{
    background-color: #d25200;
    content: "";
    position: absolute;
    bottom: 0px;
    left: 1px;
    right: 0px;
    width: 4px;
    height: 4px;
    border-radius: 100%;
    opacity: 0;
    visibility: hidden;
}
.list-all-page .page-number a:hover:after,
.list-all-page .page-number a.active:after{
    opacity: 1;
    visibility: visible;
}
.list-all-page .page-number a:hover,
.list-all-page .page-number a.active{
    color: #d25200;
}
.list-all-page .page-number a:last-child:after{
    display: none;
}
</style>
@if ($paginator->hasPages())
<div class="list-all-page">
    <span class="page-title">Showing {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{
        $paginator->total()
        }}
        result</span>
    <div class="page-number">
        @if ($paginator->onFirstPage())
        <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <i class="fa fa-angle-double-left"></i></a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" aria-disabled="false" aria-label="@lang('pagination.previous')">
            <i class="fa fa-angle-double-left"></i></a>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <a class="disabled" aria-disabled="true">{{ $element }}</a>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a href="javascript:void(0)" class="active">{{ $page }}</a>
        @else
        <a href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i
                class="fa fa-angle-double-right"></i></a>
        @else
        <a href="javascript:void(0)" class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
        </a>
        @endif
    </div>
</div>
@endif