<script lang="ts" context="module">
  const formatDate = (d: Date) => {
    const year = d.getUTCFullYear(),
      month = d.getUTCMonth(),
      day = d.getUTCDate();
    const digits = (n: number, s: any) => '0'.repeat(n - String(s).length) + s;

    return `${digits(2, day)}/${digits(2, month)}/${digits(4, year)}`;
  };

  interface Payload {
    Date: string;
    Confirmed: number;
    Active: number;
    Deaths: number;
    Recovered: number;
  }
</script>

<script lang="ts">
  export let country: string | undefined;

  let loading = true;
  let historicData: Payload[] = [];
  let currentData: Payload | null = null;
  $: {
    if (country) {
      loading = true;
      fetch(`https://api.covid19api.com/total/country/${country}`, {
        headers: {
          Accepts: 'application/json',
        },
      })
        .then((v) => v.json())
        .then((d) => {
          loading = false;
          historicData = d.slice(-11);
          currentData = d.slice(-1)[0];
        });
    } else {
      historicData = [];
      currentData = null;
      loading = false;
    }
  }
</script>

{#if country}
  {#if !loading}
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Día</th>
          <th>Casos Nuevos</th>
          <th>Fallecidos</th>
        </tr>
      </thead>
      <tbody>
        {#each historicData as { Date: date, Confirmed: confirmed, Deaths: deaths }, i}
          {#if i}
            <tr>
              <td>{formatDate(new Date(date))}</td>
              <td>{confirmed - historicData[i - 1].Confirmed}</td>
              <td>{deaths - historicData[i - 1].Deaths}</td>
            </tr>
          {/if}
        {/each}
      </tbody>
    </table>

    {#if currentData}
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Total de contagiados</th>
            <th>Total de casos activos</th>
            <th>Total de decesos</th>
            <th>Total de recuperados</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{currentData.Confirmed}</td>
            <td>{currentData.Active}</td>
            <td>{currentData.Deaths}</td>
            <td>{currentData.Recovered}</td>
          </tr>
        </tbody>
      </table>
      <span>
        Fecha de última actualización:
        {formatDate(new Date(currentData.Date))}
      </span>
    {/if}
  {:else}
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  {/if}
{/if}
