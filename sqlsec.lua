function read_query( packet )
	if string.byte(packet) == proxy.COM_QUERY then
		print(string.sub(packet,2))
		tm = io.open("tmpp","w")
		tm:write(string.sub(packet,2))
		tm:close()
		f = assert (io.popen ("check.bin"))
		for line in f:lines() do
			res = line
		end
		f:close()
		if(res ~= "sqlinjection") then
			f = assert (io.popen ("derand.bin"))
			for line in f:lines() do
				res = line
			end
			f:close()
			proxy.queries:append(1, string.char(proxy.COM_QUERY) .. res, { resultset_is_needed = false } )
		else
			print("SQL Injection Logged")
			f = assert (io.popen ("sqlsec.log"))
			f:close()
		end

		return proxy.PROXY_SEND_QUERY
	end
end
