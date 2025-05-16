let widget = new TradingView.widget({
    "width": "100%",
    "height": 500,
    "symbol": "BINANCE:BTCUSDT",
    "interval": "D",
    "timezone": "Asia/Tehran",
    "theme": localStorage.getItem('theme') || 'light',
    "style": "1",
    "locale": "fa_IR",
    "toolbar_bg": "#f1f3f6",
    "enable_publishing": false,
    "allow_symbol_change": true,
    "container_id": "tradingview_chart",
    "hide_side_toolbar": false,
    "studies": [
        "MASimple@tv-basicstudies",
        "RSI@tv-basicstudies"
    ]
});