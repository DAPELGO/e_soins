<div class="col-auto col-6">
    <div class="total panel-title" style="padding: 0.1rem 1rem;"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_product" style="font-size: 1.2rem;">0</strong></div>
</div>
<div class="table-responsive scrollbar mx-n1 px-3 mt-6 p-1" style="background-color: #F2F2F2; border-top:2px solid #004ebc;">
    <table class="table fs--1 mb-0">
        <thead>
          <tr>
            <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
              <div class="form-check mb-0 fs-0">
                <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
              </div>
            </th>
            <th class="sort white-space-nowrap align-middle ps-1" scope="col" style="width:150px;" data-sort="product">PRODUIT</th>
            <th class="sort align-middle ps-1" scope="col" data-sort="price" style="width:50px;">QUANTITÉ</th>
            <th class="sort align-middle ps-1" scope="col" data-sort="category" style="width:50px;">PRIX</th>
            <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:50px;">TOTAL</th>
          </tr>
        </thead>
        <tbody class="list" id="products-table-body">
          @foreach($products as $product)
          <tr class="position-static">
            <td class="fs--1 align-middle">
              <div class="form-check mb-0 fs-0">
                <input class="form-check-input" type="checkbox"  name="check_product{{ $product->id }}" id="check_product{{ $product->id }}" data-bulk-select-row='{"product":"","price":"0.0","category":"appareil","tags":["Health",],"star":false}' value="{{ $product->code_product }}" onclick="selectProduct({{ $product->id }}, 'product');" />
              </div>
            </td>
            <td class="product align-middle ps-1">{{ $product->name }}</td>
            <td class="price align-middle white-space-nowrap text-end fw-bold text-700">
              <input class="form-control @error('quantity') is-invalid @enderror form-control-sm" id="quantity_product{{ $product->id }}" name="quantity_product{{ $product->id }}" type="number" value="{{ old('quantity') ? old('quantity') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $product->id }}, 'product');" onkeyup="setPrice({{ $product->id }}, 'product');" />
              @error('quantity')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </td>
            <td class="category align-middle white-space-nowrap text-600 fs--1 ps-1 fw-semi-bold"><span class="badge badge-tag me-2 mb-2" id="price_product{{ $product->id }}">{{ $product->prix_drd ? $product->prix_drd : '0.00' }}</span></td>
            <td class="tags align-middle review pb-2 ps-3"><a class="text-decoration-none" href="#!"><span id="total_product{{ $product->id }}" class="badge badge-tag me-2 mb-2">{{ $product->prix_drd ? $product->prix_drd : '0.00' }}</span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
