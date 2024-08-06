<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Breeder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminBreederController extends Controller {
	public function index( Request $request ) {
		$query = $request->input( 'search' );

		$breeders = Breeder::with( 'user' )->when( $query, function ( $q ) use ( $query ) {
			return $q->where( 'name', 'like', "%{$query}%" )->orWhere( 'company_name', 'like',
				"%{$query}%" )->orWhereHas( 'user', function ( $q ) use ( $query ) {
				$q->where( 'email', 'like', "%{$query}%" );
			} );
		} )->paginate( 10 );

		return view( 'backend.pages.breeders.index', compact( 'breeders' ) );
	}

	public function store( Request $request ) {
		$request->validate( [
			'name'           => 'required|string|max:255',
			'email'          => 'required|string|email|max:255|unique:users',
			'password'       => 'required|string|min:8|confirmed',
			'status'         => 'required|string',
			'company_name'   => 'required|string|max:255',
			'company_email'  => 'nullable',
			'contact_person' => 'nullable|string|max:255',
			'street'         => 'nullable|string|max:255',
			'city'           => 'nullable|string|max:255',
			'postal_code'    => 'nullable|string|max:255',
			'country'        => 'nullable|string|max:255',
			'phone'          => 'nullable|string|max:255',
			'website'        => 'nullable|string|max:255',
		] );

		$user = User::create( [
			'email'    => $request->email,
			'password' => Hash::make( $request->password ),
			'role'     => 'breeder',
			'status'   => $request->status,
		] );

		Breeder::create( [
			'user_id'        => $user->id,
			'name'           => $request->name,
			'company_name'   => $request->company_name,
			'company_email'  => $request->email,
			'contact_person' => $request->contact_person,
			'street'         => $request->street,
			'city'           => $request->city,
			'postal_code'    => $request->postal_code,
			'country'        => $request->country,
			'phone'          => $request->phone,
			'website'        => $request->website,
		] );

		return redirect()->route( 'breeders.index' )->with( 'success', 'Breeder created successfully.' );
	}

	public function create() {
		return view( 'backend.pages.breeders.create' );
	}

	public function show( $id ) {
		$breeder = Breeder::findOrFail( $id );

		return view( 'backend.pages.breeders.show', compact( 'breeder' ) );
	}

	public function edit( $id ) {
		$breeder = Breeder::findOrFail( $id );

		return view( 'backend.pages.breeders.edit', compact( 'breeder' ) );
	}

	public function updatePassword( Request $request, $id ) {
		$request->validate( [
			'password' => 'required|string|min:8|confirmed',
		] );

		$breeder = Breeder::findOrFail( $id );
		$breeder->user->update( [
			'password' => Hash::make( $request->password ),
		] );

		return redirect()->route( 'breeders.edit', $id )->with( 'success', 'Password updated successfully.' );
	}

	public function update( Request $request, $id ) {
		$request->validate( [
			'name'           => 'required|string|max:255',
			'email'          => 'required',
			'status'         => 'required|string',
			'company_name'   => 'required|string|max:255',
			'company_email'  => 'nullable',
			'contact_person' => 'nullable|string|max:255',
			'street'         => 'nullable|string|max:255',
			'city'           => 'nullable|string|max:255',
			'postal_code'    => 'nullable|string|max:255',
			'country'        => 'nullable|string|max:255',
			'phone'          => 'nullable|string|max:255',
			'website'        => 'nullable|string|max:255',
		] );

		$breeder = Breeder::findOrFail( $id );
		$user    = $breeder->user;

		$user->update( [
			'email'  => $request->email,
			'status' => $request->status,
		] );

		$breeder->update( [
			'name'           => $request->name,
			'company_name'   => $request->company_name,
			'company_email'  => $request->email,
			'contact_person' => $request->contact_person,
			'street'         => $request->street,
			'city'           => $request->city,
			'postal_code'    => $request->postal_code,
			'country'        => $request->country,
			'phone'          => $request->phone,
			'website'        => $request->website,
		] );

		return redirect()->route( 'breeders.index' )->with( 'success', 'Breeder updated successfully.' );
	}

	public function destroy( $id ) {
		$breeder = Breeder::findOrFail( $id );
		$user    = $breeder->user;

		$breeder->delete();
		$user->delete();

		return redirect()->route( 'breeders.index' )->with( 'success', 'Breeder deleted successfully.' );
	}

	public function exportCSV() {
		$filename = 'breeders-data.csv';

		$headers = [
			'Content-Type'        => 'text/csv',
			'Content-Disposition' => "attachment; filename=\"$filename\"",
			'Pragma'              => 'no-cache',
			'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
			'Expires'             => '0',
		];

		$callback = function () {
			$handle = fopen( 'php://output', 'w' );

			// Add CSV headers
			fputcsv( $handle, [
				'Name',
				'Email',
				'Phone Number',
				'Breeder ID',
				'Company Name',
				'Street',
				'City',
				'Postal Code',
				'Country',
				'Website',
			] );

			// Fetch and process data in chunks
			Breeder::with( 'user' )->chunk( 100, function ( $breeders ) use ( $handle ) {
				foreach ( $breeders as $breeder ) {
					$data = [
						$breeder->name ?? '',
						$breeder->user->email ?? '',
						$breeder->phone ?? '',
						$breeder->id ?? '',
						$breeder->company_name ?? '',
						$breeder->street ?? '',
						$breeder->city ?? '',
						$breeder->postal_code ?? '',
						$breeder->country ?? '',
						$breeder->website ?? '',
					];
					fputcsv( $handle, $data );
				}
			} );

			fclose( $handle );
		};

		return response()->stream( $callback, 200, $headers );
	}

}
