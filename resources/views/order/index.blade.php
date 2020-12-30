<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container{
          display: grid;
          grid-template-columns: 20px 1fr 5fr 1fr 20px;
          grid-template-rows: auto;
          grid-template-areas:     
          ". . store .  ."
          ". h2 h2 h2 ."
          ". filtras filtras filtras ."
          ". lentele lentele lentele ."
          "lia lia lia lia lia"
          ". lentele1 lentele1 lentele1 .";
        }
          table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }
          
          td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
          }
          
          tr:nth-child(even) {
            background-color: #dddddd;
          }
          .store{
            padding: 20px;
            grid-area: store;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
          }
          .lentele{
            grid-area: lentele;
            overflow-x:auto;
          }
          .lentele1{
            grid-area: lentele1;
            overflow-x:auto;
          }
          h2{
            grid-area: h2;
            text-align: center;
          }
          .lia{
            grid-area: lia;
            text-align: center;
          }
          .ivestis{
            /* width: 200px; */
            padding: 0px 20px;
            float: left;
          }
          .btn_ivastis{
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            padding: 0px 20px;
          }
          .filtras{
            grid-area: filtras;
            text-align: center;
          }
          header{
            height: 40px;
            background-color: aliceblue;
          }
      </style>
    <title>Uzsakymai</title>
</head>
<body>
  <header>
    <a href="{{route('welcome')}}"><button>Atgal</button></a>
  </header>
  <div class="container">
    <div class="store">
      <form action="{{route('order.store')}}" method="post">
        <div class="ivestis">
            <label for="uzsakovas">Uzsakovas:</label><br>
            <input type="text"  size="8" name="uzsakovas" value="">
        </div>
        <div class="ivestis">
            <label for="pavadinimas">Pavadinimas:</label><br>
            <input type="text"  size="8" name="pavadinimas" value="">
        </div>
        <div class="ivestis">
          <label for="ilgis">Ilgis:</label><br>
          <input type="text"  size="8" name="ilgis" value=""><br><br>
        </div>
        <div class="ivestis">
          <label for="plotis">Plotis:</label><br>
          <input type="text"  size="8" name="plotis" value="">
        </div>
        <div class="ivestis">
          <label for="medziaga">Medziaga:</label><br>
          <input type="text"  size="8" name="medziaga" value=""><br><br>
        </div>
        <div class="ivestis">
          <label for="klijai">Klijai:</label><br>
          <input type="text"  size="8" name="klijai" value=""><br><br>
        </div>
        <div class="ivestis">
            <label for="eiles">eiles:</label><br>
            <input type="text"  size="8" name="eiles" value=""><br><br>
        </div>
        <div class="ivestis">
            <label for="spalva">Spalva:</label><br>
            <input type="text"  size="8" name="spalva" value=""><br><br>
        </div>
        <div class="ivestis">
          <label for="kiekis">Kiekis:</label><br>
          <input type="text"  size="8" name="kiekis" value=""><br><br>
        </div>
        <div class="btn_ivastis">
          <input  type="submit" value="Submit">
          @csrf
        </div>
      </form>
    </div>
  
    <h2>Einamuju uzsakymu sarasas</h2>
    
    <div class="lentele" >
      <table>
        <tr>
          <th>Uzsakovas</th>
          <th>Pavadinimas</th>
          <th>Ilgis</th>
          <th>Plotis</th>
          <th>Medziaga</th>
          <th>Klijai</th>
          <th>Eiles</th>
          <th>Spalvos</th>
          <th>Kiekis</th>
          <th>Masina</th>
          <th>Priskirti masina</th>
          <th>Keisti</th>
          <th>Info</th>
          <th>Istrinti</th>
        </tr>
        
        @foreach ($orders as $order)
        @if ($order->status !== 4)
            
        
            
        <tr>
          <form action="{{route('order.update',$order)}}" method="get">
            <td><input type="text"  size="10" name="uzsakovas" value="{{$order->uzsakovas}}"></td>
            <td><input type="text"  size="10" name="pavadinimas" value="{{$order->pavadinimas}}"></td>
            <td><input type="text"  size="2" name="ilgis" value="{{$order->ilgis}}"></td>
            <td><input type="text"  size="2" name="plotis" value="{{$order->plotis}}"></td>
            <td><input type="text"  size="4" name="medziaga" value="{{$order->medziaga}}"></td>
            <td><input type="text"  size="2" name="klijai" value="{{$order->klijai}}"></td>
            <td><input type="text"  size="1" name="eiles" value="{{$order->eiles}}"></td>
            <td><input type="text"  size="1" name="spalva" value="{{$order->spalva}}"></td>
            <td><input type="text"  size="4" name="kiekis" value="{{$order->kiekis}}"></td>
            <td>
              @foreach ($machines as $machine)
              @if ($order->machine_id == $machine->id)
                {{$machine->pavadinimas}}
              @endif
              @endforeach
            </td>
            <td>    
              
              <select name="machine_id" >
                <option value="0">All</option>
                  @foreach ($machines as $machine)
                  <option value="{{$machine->id}}">{{$machine->pavadinimas}}</option>
                @endforeach
              </select>

            </td>
            <td>
              <button type="submit">Save</button> 
            </td>
          </form>
          <td>
            <a href="{{route('order.index', $order )}}"><button>Info</button></a>
          </td>
          <td>
            <a href="{{route('order.destroy', $order)}} "><button>Delete</button></a>
          </td>
        </tr>
        @endif
        @endforeach
        
      </table>
    </div>

    <h2 class="lia">Supakuotu uzsakymu sarasas</h2>

    <div class="lentele1" >
      <table>
        <tr>
          <th>Uzsakovas</th>
          <th>Pavadinimas</th>
          <th>Ilgis</th>
          <th>Plotis</th>
          <th>Medziaga</th>
          <th>Klijai</th>
          <th>Eiles</th>
          <th>Spalvos</th>
          <th>Kiekis</th>

          <th>Keisti</th>
          <th>Info</th>
          
        </tr>
        
        @foreach ($ordersDonePacking as $ordersDonePacking)

        <tr>
          <form action="{{route('order.update',$ordersDonePacking)}}" method="get">
            <td><input type="text" size="10" name="uzsakovas" value="{{$ordersDonePacking->uzsakovas}}"></td>
            <td><input type="text" size="10" name="pavadinimas" value="{{$ordersDonePacking->pavadinimas}}"></td>
            <td><input type="text" size="2" name="ilgis" value="{{$ordersDonePacking->ilgis}}"></td>
            <td><input type="text" size="2" name="plotis" value="{{$ordersDonePacking->plotis}}"></td>
            <td><input type="text" size="4" name="medziaga" value="{{$ordersDonePacking->medziaga}}"></td>
            <td><input type="text" size="2" name="klijai" value="{{$ordersDonePacking->klijai}}"></td>
            <td><input type="text" size="1" name="eiles" value="{{$ordersDonePacking->eiles}}"></td>
            <td><input type="text" size="1" name="spalva" value="{{$ordersDonePacking->spalva}}"></td>
            <td><input type="text" size="4" name="kiekis" value="{{$ordersDonePacking->kiekis}}"></td>

            <td>
              <button type="submit">Save</button> 
            </td>
          </form>
          <td>
            {{-- apgalvoti pagamintu, supakuotu, isveztu uzsakymu talpinima ir atsekamuma --}}
            <a href="{{route('order.index', $ordersDonePacking )}}"><button>Info</button></a>
          </td>
 
        </tr>
        @endforeach
        
      </table>
    </div>



  </div>
</body>
</html>