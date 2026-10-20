import { useEffect, useMemo, useState } from 'react';
import { api, type Ar } from './api';

// ar tábla adatai táblázatban.

export default function ArakApp() {
    const [arak, setArak] = useState<Ar[]>([]);
    const [betolt, setBetolt] = useState(true);
    const [hiba, setHiba] = useState<string | null>(null);
    const [kereses, setKereses] = useState('');

    
    useEffect(() => {
        api.get<Ar[]>('/arak')
            .then((valasz) => setArak(valasz.data))
            .catch(() => setHiba('Az árak betöltése nem sikerült.'))
            .finally(() => setBetolt(false));
    }, []);

    // Keresés a sütemény nevében 
    const lathato = useMemo(
        () => arak.filter((ar) => (ar.suti_nev ?? '').toLowerCase().includes(kereses.toLowerCase())),
        [arak, kereses],
    );

    if (betolt) return <p className="text-center py-5"><span className="spinner-border text-primary" /> Betöltés…</p>;
    if (hiba) return <div className="alert alert-danger">{hiba}</div>;

    return (
        <>
            <div className="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 className="text-uppercase m-0">Sütemények árai</h2>
                <input
                    type="search"
                    className="form-control w-auto"
                    placeholder="Keresés sütemény szerint…"
                    value={kereses}
                    onChange={(e) => setKereses(e.target.value)}
                />
            </div>

            <div className="table-responsive">
                <table className="table table-striped table-hover align-middle">
                    <thead className="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Sütemény</th>
                            <th className="text-end">Ár</th>
                            <th>Egység</th>
                        </tr>
                    </thead>
                    <tbody>
                        {lathato.map((ar) => (
                            <tr key={ar.id}>
                                <td>{ar.id}</td>
                                <td className="fw-bold">{ar.suti_nev}</td>
                                <td className="text-end">{ar.ertek.toLocaleString('hu-HU')} Ft</td>
                                <td>{ar.egyseg}</td>
                            </tr>
                        ))}
                        {lathato.length === 0 && (
                            <tr><td colSpan={4} className="text-center text-muted py-4">Nincs találat.</td></tr>
                        )}
                    </tbody>
                </table>
            </div>
            <p className="text-muted small">{lathato.length} / {arak.length} ár</p>
        </>
    );
}
