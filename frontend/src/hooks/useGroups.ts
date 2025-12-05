import { useEffect, useState } from "react";

type Group = {
    id: number;
    name: string;
};

export function useGroups() { // Custom hook to fetch groups data for component use
    const [groups, setGroups] = useState<Group[]>([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState<unknown>(null);

    useEffect(() => {
        async function loadGroups() {
            try {
                const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/groups/`);
              
                if (!res.ok) throw new Error("Failed to fetch groups");

                const data = await res.json();
                setGroups(data);
            } catch (err) {
                setError(err);
            } finally {
                setLoading(false);
            }
        }

        loadGroups();
    }, []);

    return { groups , loading, error }; // Return groups data along with loading and error states
}
