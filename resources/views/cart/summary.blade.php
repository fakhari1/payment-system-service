<div class="border rounded bg-light p-3 mb-2">
    <h3>پرداخت</h3>
    <hr>
    <div class="d-flex justify-content-between border-bottom p-3">
        <div class="title">مبلغ کل</div>
        <div class="price">
            {{ number_format($sum / 10) }}
            تومان
        </div>
    </div>
    <div class="d-flex justify-content-between border-bottom p-3">
        <div class="title">هزینه حمل</div>
        <div class="price">
            {{ number_format($sendCost / 10) }}
            تومان
        </div>
    </div>
    <div class="d-flex justify-content-between p-3">
        <div class="title">مبلغ قابل پرداخت</div>
        <div class="price">
            {{ number_format(($sum + $sendCost) / 10) }}
            تومان
        </div>
    </div>
</div>
