public function store(Request $r) { /* seperti sebelumnya */ }
public function indexAdmin() { $topups = Topup::all(); return view('admin.topups', compact('topups')); }
public function update(Request $r, Topup $topup) { /* seperti approve/reject */ }
