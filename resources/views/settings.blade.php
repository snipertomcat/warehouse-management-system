@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    <ul>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/sales">Sales</a></li>
                        <li><a href="/deliveries">Deliveries</a></li>
                        <li><a href="/stock">Stock Management</a></li>
                        <li><a href="/products">Products</a></li>
                        <li><a href="/settings">Settings</a></li>
                        <ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label for="enable_email_notifications">Enable Email Notifications: </label>
                        <input class="form-check-input" type="checkbox" name="enable_email_notifications">
                    </div>

                    <div class="form-group">
                        <label for="enable_sms_notifications">Enable SMS Notifications: </label>
                        <input class="form-check-input" type="checkbox" name="enable_sms_notifications">
                    </div>

                    <div class="form-group">
                        <label for="enable_slack_notifications">Enable Slack Notifications: </label>
                        <input class="form-check-input" type="checkbox" name="enable_slack_notifications">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 