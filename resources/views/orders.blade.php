@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Neues Bestellung erstellen
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('errors.orders')

                    <!-- New Order Form -->
                    <form action="{{ url('order')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-sm-2">
								Datum
                                <input type="text" name="order_date" id="order-date" class="form-control" value="{{ old('order_date') }}">
                            </div>
							<div class="col-sm-2">
								Uhrzeit
                                <input type="text" name="order_time" id="order-time" class="form-control" value="{{ old('order_time') }}">
                            </div>
							<div class="col-sm-2">
								Name
                                <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name') }}">
                            </div>
							<div class="col-sm-2">
								Anzahl
                                <input type="text" name="article_amount" id="article-amount" class="form-control" value="{{ old('article_amount') }}">
                            </div>
							<div class="col-sm-2">
								Artikel
								<select name="article_id" id="article-id" class="form-control">
									@foreach ($articles as $article)
										<option value="{{ $article->id }}">{{ $article->article_name }}</option>
									@endforeach
								</select>
                            </div>
							<div class="col-sm-2">Auf Rechnung
                                <input type="checkbox" name="payment_cash" class="form-control" id="payment-cash" value="1" @if(old('payment_cash')=="1") checked @endif)>
                            </div>
                        </div>

                        <!-- Add Order Button -->
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>speichern
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Orders -->
            @if (count($orders) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Aktuelle Bestellungen
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Datum</th>
								<th>Uhrzeit</th>
								<th>Name</th>
								<th>Anzahl</th>
								<th>Artikel</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="table-text"><div>{{ $order->order_date }}</div></td>
										<td class="table-text"><div>{{ $order->order_time }}</div></td> 
										<td class="table-text"><div>{{ $order->customer_name }}</div></td> 
										<td class="table-text"><div>{{ $order->article_amount }}</div></td> 
										<td class="table-text"><div>{{ $order->article_name }}</div></td> 
										<td class="table-text"><div> @if($order->payment_cash) Ja @else Nein @endif</div></td> 										
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection